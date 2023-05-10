// 공부하기 버튼 클릭 이벤트 처리
document.getElementById("study").addEventListener("click", function() {
  document.getElementById("initial-container").classList.add("hidden");
  // 이미지를 불러올 경로
  const imagePath = "https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAxNzA2MjBfMjM0%2FMDAxNDk3OTIwMTYwNjg0.e09XJx9ecEvnG1hOV_PzISK_iOBBHBBEzDjyTwu8T4sg.zt-QinD7qigLW2f8JwylVVh76Mu7Qqd9qg4c8ULo8v0g.JPEG.with_bubmusa%2F%25BC%25F6%25C8%25AD%25C6%25E4%25C0%25CC%25C1%25F6.jpg&type=sc960_832";

  // 결과 화면을 숨김
  document.getElementById("test-container").classList.add("hidden");

  // 이미지를 불러와 화면에 보여줌
  const image = document.getElementById("image");
  image.style.width = "1000px";
  image.style.height = "600px";
  image.setAttribute("src", imagePath);
  document.getElementById("image-container").classList.remove("hidden");

  document.getElementById("back1").addEventListener("click", function() {
    document.getElementById("initial-container").classList.remove("hidden");
    document.getElementById("image-container").classList.add("hidden");

    // 이전에 등록된 모든 이벤트 핸들러 제거
    canvas.removeEventListener("mousedown", onMouseDown);
    canvas.removeEventListener("mouseup", onMouseUp);
    canvas.removeEventListener("mousemove", onMouseMove);
  });
});

// 테스트 버튼 클릭 이벤트 처리
document.getElementById("test").addEventListener("click", function() {
  document.getElementById("initial-container").classList.add("hidden");
  // 캔버스 초기화
  const canvas = document.getElementById("canvas");
  const context = canvas.getContext("2d");
  context.clearRect(0, 0, canvas.width, canvas.height);

  // 이미지 화면을 숨김
  document.getElementById("image-container").classList.add("hidden");

  // 결과 화면을 초기화하고 보여줌
  document.getElementById("test-container").classList.remove("hidden");
  document.getElementById("result").textContent = "";

  // 이전으로 버튼 클릭 이벤트 처리
  document.getElementById("back2").addEventListener("click", function() {
    document.getElementById("initial-container").classList.remove("hidden");
    document.getElementById("test-container").classList.add("hidden");
  });

  // 캔버스에 마우스 이벤트 추가
  canvas.addEventListener("mousedown", function(event) {
    context.beginPath();
    context.moveTo(event.offsetX, event.offsetY);
    canvas.addEventListener("mousemove", onMouseMove);
    canvas.addEventListener("mouseup", async function() {
      // 캔버스 이미지 데이터를 base64로 변환
      const imageData = canvas.toDataURL();

      // tensorflowlite로 예측
      const model = await tf.loadLayersModel("model.json");
      const tensor = tf.browser.fromPixels(canvas);
      const resized = tf.image.resizeBilinear(tensor, [28, 28]);
      const gray = resized.mean(2);
      const expanded = gray.expandDims(0).expandDims(-1).toFloat().div(255);
      const prediction = model.predict(expanded);
      const result = prediction.argMax(1).dataSync()[0];

      // 결과를 화면에 표시
      const label = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
      document.getElementById("result").textContent = "예측: " + label[result];

      // 마우스 이벤트 제거
      canvas.removeEventListener("mousemove", onMouseMove);
      canvas.removeEventListener("mouseup", arguments.callee);
    });
  });
});