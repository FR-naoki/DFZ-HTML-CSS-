<?php   

require __DIR__.'/../lib/functions.php';

$id = escape($_GET['id'] ?? '');

$data = fetchById($id);

if (!$data) {
    error404();
}

$formattedData = generatedFormattedData($data);

$question = $formattedData['question'];
$answers = $formattedData['answers'];
$correctAnswer = $formattedData['correctAnswer'];
$correctAnswerValue = $answers[$correctAnswer];
$explanation = $formattedData['explanation'];


loadTemplate();
