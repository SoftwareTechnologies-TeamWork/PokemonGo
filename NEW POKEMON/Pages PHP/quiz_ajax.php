<?php
    session_start();

    if (isset($_POST['score']) && isset($_POST['currentQuestion'])) {
        $score = $_POST['score'];
        $currentQuestion = $_POST['currentQuestion'];
        $returnData = [];

        $returnData[] = $score;
        $returnData[] = $currentQuestion;

        $_SESSION['score'] = $score;
        $_SESSION['currentQuestion'] = $currentQuestion;

        echo json_encode($returnData);
    }
?>