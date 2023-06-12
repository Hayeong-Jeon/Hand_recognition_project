<?php

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
 
$questionsToShow = 18; // Number of questions to display

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];

    $_SESSION['userAnswers'] = $answers;

    $correctAnswers = 0;
    for ($i = 0; $i < $questionsToShow; $i++) {
        $questionData = $questions[$i];
        $correctAnswersArray = $questionData['correctAnswer'];
        $selectedAnswer = $answers[$i];
    
        // Check if the selected answer is among the correct answers
        if (is_array($correctAnswersArray) && in_array($selectedAnswer, $correctAnswersArray)) {
            $correctAnswers++;
        }
        elseif (isset($_SESSION['userAnswers']) && !isset($_SESSION['correctAnswers'])) {
            $userAnswers = $_SESSION['userAnswers'];
            $correctAnswers = 0;
        
            for ($i = 0; $i < $questionsToShow; $i++) {
                $questionData = $questions[$i];
                $correctAnswer = $questionData['correctAnswer'];
        
                if (is_array($correctAnswer) && in_array($userAnswers[$i], $correctAnswer)) {
                    $correctAnswers++;
                } elseif ($userAnswers[$i] === $correctAnswer) {
                    $correctAnswers++;
                }
            }
        
            $_SESSION['correctAnswers'] = $correctAnswers; // Update the session variable
        
            $score = $correctAnswers * 5;
        }
    }
}
$questionIndices = array_rand($questions, $questionsToShow);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("wide_field_image.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            overflow: auto;
            background-position: center top;
            z-index: -1;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Quiz</h1>
    <?php if (!isset($_SESSION['userAnswers'])): ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php foreach ($questions as $i => $questionData): ?>
                     <h2><?php echo $questionData['question']; ?></h2>
                       <img src="<?php echo $questionData['image']; ?>" alt="Question Image">
                    <?php foreach ($questionData['choices'] as $choice): ?>
                        <label>
                           <input type="radio" name="answers[<?php echo $i; ?>]" value="<?php echo $choice; ?>">
                          <?php echo $choice; ?>
                         </label>
                    <?php endforeach; ?>
            <?php endforeach; ?>
            <input type="submit" value="Submit">
        </form>
    <?php elseif (isset($_SESSION['userAnswers']) && !isset($_SESSION['correctAnswers'])): ?>
        <?php
        $userAnswers = $_SESSION['userAnswers'];
        $correctAnswers = 0;

        for ($i = 0; $i < $questionsToShow; $i++) {
            $questionData = $questions[$i];
            $correctAnswer = $questionData['correctAnswer'];

            if ($userAnswers[$i] === $correctAnswer) {
                $correctAnswers++;
            }
        }

        $_SESSION['correctAnswers'] = $correctAnswers; // Update the session variable

        $score = $correctAnswers * 5;
        ?>

        <h2>Quiz Results</h2>
        <p>Number of Questions Matched: <?php echo $correctAnswers; ?></p>
        <p>Score: <?php echo $score; ?></p>
        <div class="restart-button">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="submit" value="Restart Quiz">
            </form>
        </div>
    <?php elseif (isset($_SESSION['userAnswers']) && isset($_SESSION['correctAnswers'])): ?>
        <!-- Quiz submitted and results displayed -->
        <?php
        $correctAnswers = $_SESSION['correctAnswers'];
        $score = $correctAnswers * 5;
        ?>

        <h2>퀴즈 결과</h2>
        <p>맞춘 문제 개수: <?php echo $correctAnswers; ?></p>
        <p>점수: <?php echo $score; ?></p>
        <div class="restart-button">
            <form method="get" action="test.html">
                <input type="submit" value="Restart Quiz">
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>