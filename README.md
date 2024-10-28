# Hand_recognition
### : 누구나 쉽게 익힐 수 있는 지문자
<div align="center">
  <img src="image/assets/썸넬.PNG" height="300" width="50%">
</div>


## 1. 페이지 설명 (detail of page)
### 공부하기 페이지
지문자 표를 이용한 학습페이지

<img src="image/assets/공부하기.gif" height="300" width="50%">



필기부분
수어 지문자의 이미지를보고 무슨 글자인지 정답을 맞추며 점수를 알려준다.

실기부분
mediapipe를 사용하여 손의 랜드마크 간 각도를 계산하고, tensorflowlite 모델을 사용하여 웹캠에서 손을 인식하고 결과를 반환하는 Python 코드다. 또한, 이 코드는 socket을 열어 서버로 작동하며, JavaScript를 사용하는 클라이언트와 상호작용한다.
