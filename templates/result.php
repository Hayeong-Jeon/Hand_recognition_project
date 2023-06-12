<?php
session_start();

// 퀴즈 질문 배열
$questions = array(
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/a.png',
        'choices' => array('ㄱ', 'ㄴ', 'ㄷ', 'ㅁ'),
        'correctAnswer' => 'ㄱ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/aa.png',
        'choices' => array('ㄴ', 'ㅃ', 'ㄲ', 'ㄹ'),
        'correctAnswer' => 'ㄲ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/b.png',
        'choices' => array('ㄹ', 'ㅁ', 'ㄱ', 'ㄴ'),
        'correctAnswer' => 'ㄴ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/c.png',
        'choices' => array('ㄹ', 'ㄷ', 'ㅎ', 'ㅋ'),
        'correctAnswer' => 'ㄷ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/cc.png',
        'choices' => array('ㅃ', 'ㅉ', 'ㄸ', 'ㅆ'),
        'correctAnswer' => 'ㄸ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/d.png',
        'choices' => array('ㄱ', 'ㄴ', 'ㄹ', 'ㅁ'),
        'correctAnswer' => 'ㄹ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/e.png',
        'choices' => array('ㅇ', 'ㅊ', 'ㅋ', 'ㅁ'),
        'correctAnswer' => 'ㅁ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/f.png',
        'choices' => array('ㅂ', 'ㅋ', 'ㄱ', 'ㅁ'),
        'correctAnswer' => 'ㅂ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/ff.png',
        'choices' => array('ㅃ', 'ㅉ', 'ㄲ', 'ㅆ'),
        'correctAnswer' => 'ㅃ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/g.png',
        'choices' => array('ㅅ', 'ㄱ', 'ㄷ', 'ㅈ'),
        'correctAnswer' => 'ㅅ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/h.png',
        'choices' => array('ㅇ', 'ㅁ', 'ㅎ', 'ㅊ'),
        'correctAnswer' => 'ㅇ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/i.png',
        'choices' => array('ㅍ', 'ㅋ', 'ㅈ', 'ㅁ'),
        'correctAnswer' => 'ㅈ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/ii.png',
        'choices' => array('ㅃ', 'ㅉ', 'ㄸ', 'ㄲ'),
        'correctAnswer' => 'ㅉ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/j.png',
        'choices' => array('ㅍ', 'ㅊ', 'ㅎ', 'ㅁ'),
        'correctAnswer' => 'ㅊ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/k.png',
        'choices' => array('ㅋ', 'ㅌ', 'ㅊ', 'ㅍ'),
        'correctAnswer' => 'ㅋ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/l.png',
        'choices' => array('ㅎ', 'ㄷ', 'ㅌ', 'ㄹ'),
        'correctAnswer' => 'ㅌ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/m.png',
        'choices' => array('ㄱ', 'ㅂ', 'ㅍ', 'ㅋ'),
        'correctAnswer' => 'ㅍ'
    ),
    array(
        'question' => '아래 그림이 나타내는 단어는?',
        'image' => 'http://localhost:8080/handstest/images/n.png',
        'choices' => array('ㅇ', 'ㅎ', 'ㄱ', 'ㅋ'),
        'correctAnswer' => 'ㅎ'
    ),
    
);
shuffle($questions);

// userAnswers를 세션에서 가져옴
$userAnswers = $_SESSION['userAnswers'];

// 퀴즈 질문의 수, 정답 수, 점수 초기화
$totalQuestions = count($questions);
$correctAnswers = 0;
$score = 0;

// 퀴즈 결과 계산
for ($i = 0; $i < $totalQuestions; $i++) {
    $correctAnswer = $questions[$i]['correctAnswer'];
    $userAnswer = isset($userAnswers[$i]) ? $userAnswers[$i] : '';

    if ($userAnswer === $correctAnswer) {
        $correctAnswers++;
        $score += 5; // 맞은 답변마다 점수 5점 증가
    }
}

// '퀴즈 다시 시작' 버튼이 클릭되었는지 확인
if (isset($_POST['reset'])) {
    // 세션 변수 초기화 및 test.html로 리디렉션
    session_unset();
    session_destroy();
    header("Location: test.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>퀴즈 결과</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .result-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
<h1>퀴즈 결과</h1>
<div class="result-container">
    <p>정답 수: <?php echo $correctAnswers; ?></p>
    <p>점수: <?php echo $score; ?></p>

    <!-- '퀴즈 다시 시작' 버튼 추가 -->
    <form method="post">
        <input type="submit" name="reset" value="퀴즈 다시 시작">
    </form>
</div>
</body>
</html>
