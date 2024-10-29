from flask import Flask, render_template
import cv2
import mediapipe as mp
import json
from flask_socketio import SocketIO

app = Flask(__name__)
socketio = SocketIO(app)

# Hand detection module

mpHands = mp.solutions.hands
hands = mpHands.Hands()
mpDraw = mp.solutions.drawing_utils

# Webcam capture
cap = cv2.VideoCapture(0)

@socketio.on('connect')
def test_connect():
    print('Client connected')

@socketio.on('disconnect')
def test_disconnect():
    print('Client disconnected')

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/test')
def test():
    return render_template('test.html')

@app.route('/normal2')
def normal2():
    return render_template('normal2.html')

@socketio.on('request_frame')
def send_frame():
    while True:
        success, img = cap.read()
        imgRGB = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        results = hands.process(imgRGB)

        if results.multi_hand_landmarks:
            for handLms in results.multi_hand_landmarks:
                for id, lm in enumerate(handLms.landmark):
                    h, w, c = img.shape
                    cx, cy = int(lm.x * w), int(lm.y * h)
                    # Draw landmarks on the image
                    mpDraw.draw_landmarks(img, handLms, mpHands.HAND_CONNECTIONS)

        _, jpeg = cv2.imencode('.jpg', img)
        frame_data = jpeg.tobytes()
        socketio.emit('frame', frame_data)

if __name__ == '__main__':
    socketio.run(app)
