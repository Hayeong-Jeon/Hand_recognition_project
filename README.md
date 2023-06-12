# Hand_recognition_project

필기부분
수어 지문자의 이미지를보고 무슨 글자인지 정답을 맞추며 점수를 알려준다.

실기부분
mediapipe를 이용해서 손의 랜드마크 간 각도를 계산해 지문자 글자로 번역하는 학습이 된
tensorflowlite 모델을 사용하여 웹캠에 손을 인식해 결과를 반환하며, 동시에 socket을 열어 서버역할을 하는 python코드와
클라이언트역할을 하는 javascript가 서로 상호작용한다.
