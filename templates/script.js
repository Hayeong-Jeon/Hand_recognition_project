
// 공부하기 버튼 클릭 이벤트 처리

document.getElementById("study").addEventListener("click", function() {
  document.getElementById("initial-container").classList.add("hidden");
  // 이미지를 불러올 경로
  const imagePath = "https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAxNzA2MjBfMjM0%2FMDAxNDk3OTIwMTYwNjg0.e09XJx9ecEvnG1hOV_PzISK_iOBBHBBEzDjyTwu8T4sg.zt-QinD7qigLW2f8JwylVVh76Mu7Qqd9qg4c8ULo8v0g.JPEG.with_bubmusa%2F%25BC%25F6%25C8%25AD%25C6%25E4%25C0%25CC%25C1%25F6.jpg&type=sc960_832"; // 올바른 이미지 경로로 수정

  // 결과 화면을 숨김
  document.getElementById("test-container").classList.add("hidden");

  // 이미지를 불러와 화면에 보여줌
  const image = document.getElementById("image");
  image.style.width = "1000px";
  image.style.height = "650px";
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
  window.location.href = "test.html";
});
