import cv2
import mediapipe as mp
import numpy as np
import base64
import tensorflow as tf
from flask import Flask, render_template
from flask_cors import CORS
from flask_socketio import SocketIO
import mysql.connector
from collections import Counter
import datetime
import random
import threading

app = Flask(__name__, static_folder='static')
CORS(app)
socketio = SocketIO(app, cors_allowed_origins="*")

is_processing = False
random_problem = None  # 현재 문제
timer_started = False  # 타이머 시작 여부
timer_end_time = None  # 타이머 종료 시간
results = []  # 손 인식 결과 저장
timer_results = []  # 타이머 동안의 손 인식 결과 저장
problemCount = 0

# MySQL 데이터베이스 연결
cnx = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='handstest'
)

# 커서 생성
cursor = cnx.cursor()

max_num_hands = 1
classes = [
    "ㄱ", "ㄴ", "ㄷ", "ㄹ", "ㅁ", "ㅂ", "ㅅ", "ㅇ", "ㅈ", "ㅊ",
    "ㅋ", "ㅌ", "ㅍ", "ㅎ", "ㅏ", "ㅐ", "ㅑ", "ㅓ", "ㅔ", "ㅕ",
    "ㅗ", "ㅛ", "ㅜ", "ㅠ", "ㅡ", "ㅣ", "ㅢ", "ㅚ", "ㅟ", "ㅖ", "ㅒ"
]

# MediaPipe hands model
mp_hands = mp.solutions.hands
mp_drawing = mp.solutions.drawing_utils
hands = mp_hands.Hands(
    max_num_hands=max_num_hands,
    min_detection_confidence=0.5,
    min_tracking_confidence=0.5)

# Gesture recognition model
interpreter = tf.lite.Interpreter(model_path='converted_model.tflite')
interpreter.allocate_tensors()
input_details = interpreter.get_input_details()
output_details = interpreter.get_output_details()

@app.route('/')
def index():
    return render_template('normal.html')

@socketio.on('connect')
def connect():
    print('Client connected')

@socketio.on('disconnect')
def disconnect():
    print('Client disconnected')

@socketio.on('frame_request')
def process_frame():
    global is_processing, random_problem

    if is_processing:
        return

    is_processing = True

    cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)
    while is_processing:
        ret, img = cap.read()
        if not ret:
            continue
        
        img = cv2.flip(img, 1)
        img_rgb = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        result = hands.process(img_rgb)

        img_bgr = cv2.cvtColor(img_rgb, cv2.COLOR_RGB2BGR)

        if result.multi_hand_landmarks is not None:
            for res in result.multi_hand_landmarks:
                joint = np.zeros((21, 3))
                for j, lm in enumerate(res.landmark):
                    joint[j] = [lm.x, lm.y, lm.z]

                # Compute angles between joints
                v1 = joint[[0,1,2,3,0,5,6,7,0,9,10,11,0,13,14,15,0,17,18,19],:] # Parent joint
                v2 = joint[[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],:] # Child joint
                v = v2 - v1 # [20,3]
                # Normalize v
                v = v / np.linalg.norm(v, axis=1)[:, np.newaxis]

                # Get angle using arcos of dot product
                angle = np.arccos(np.einsum('nt,nt->n',
                    v[[0,1,2,4,5,6,8,9,10,12,13,14,16,17,18],:], 
                    v[[1,2,3,5,6,7,9,10,11,13,14,15,17,18,19],:])) # [15,]

                angle = np.degrees(angle) # Convert radian to degree

                # Inference gesture
                data = np.array([angle], dtype=np.float32)
                interpreter.set_tensor(input_details[0]['index'], data)
                interpreter.invoke()
                output_data = interpreter.get_tensor(output_details[0]['index'])
                idx = int(output_data.argmax())

                # Add result to lists
                results.append(classes[idx])
                timer_results.append(classes[idx])

        # Encode image as base64
        _, jpeg = cv2.imencode('.jpg', img_bgr)
        frame = base64.b64encode(jpeg.tobytes()).decode('utf-8')

        # Send frame to client
        socketio.emit('frame', frame)

    cap.release()
    cv2.destroyAllWindows()

    is_processing = False

@socketio.on('timer_end')
def handle_timer_end():

    print(timer_results)
    
    # 타이머 종료 시 처리할 코드 작성
    compare_result_with_database(random_problem)

def compare_result_with_database(problem):
    global timer_results

    # 데이터베이스에서 현재 문제의 정답 가져오기
    cursor.execute("SELECT selected_answer FROM quiz_test WHERE question = %s", (problem,))
    db_answer = cursor.fetchone()


    if db_answer is not None:
        db_answer = db_answer[0]

        # 결과와 데이터베이스의 정답 비교
        if len(timer_results) > 0:
            most_common_result = Counter(timer_results).most_common(1)[0][0]
            if most_common_result == db_answer:
                result = '정답입니다!'
            else:
                result = '오답입니다!'
        else:
            result = '손 인식 결과가 없습니다.'

        # Send result to client
        socketio.emit('quiz_result', result)

        timer_results.clear()  # Clear timer results

@socketio.on('start_timer')
def start_timer():
    global timer_started, timer_end_time, random_problem, results, problemCount

    if not timer_started:
        timer_started = True
        
        results.clear()  # Clear results for the new timer session

        # Generate a random problem and send it to the client
    random_problem = generate_random_problem()
    socketio.emit('new_problem', random_problem)

def generate_random_problem():
    global cursor, problemCount

    # 데이터베이스에서 출제되지 않은 문제 가져오기
    cursor.execute("SELECT question FROM quiz_test WHERE question NOT IN (SELECT DISTINCT selected_answer FROM quiz_test) ORDER BY RAND() LIMIT 1")
    db_result = cursor.fetchone()

    print(db_result)

    if db_result is not None:
        random_problem = db_result[0]
        problemCount += 1  # 문제 수 증가
    else:
        random_problem = 'No Problem Found'

    return random_problem

if __name__ == '__main__':
    socketio.run(app, host='localhost', port=5000, debug=True)
