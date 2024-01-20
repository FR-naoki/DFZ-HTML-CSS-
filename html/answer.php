<?php 

require __DIR__.'/../lib/functions.php';


$id = $_POST['id'] ?? '';
$selectedAnswer = $_POST['selectedAnswer'] ?? '';

$data = fetchById($id);

if (!$data) {
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する
    header('Content-Type: text/html; charset=UTF-8');
    
    include __DIR__.'/../template/404.tpl.php';
    exit(0);
}

$formattedData = generatedFormattedData($data);

$correctAnswer = $formattedData['correctAnswer'];
$correctAnswerValue = $formattedData['answers'][$correctAnswer];
$explanation = $formattedData['explanation'];


// $result = false;
// if ($selectedAnswer === $correctAnswer) {
//     $result = true;
// }
// ↓

$result = $selectedAnswer === $correctAnswer;

echo $result;
var_dump($result);
echo $correctAnswer;
echo $correctAnswerValue;
echo $explanation;

