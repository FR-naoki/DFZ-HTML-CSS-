<?php   

require __DIR__.'/../lib/functions.php';

$id = '3';

$data = fetchById($id);
// echo '<pre>';
// var_dump($data);

// $handler = fopen(__DIR__.'/../lib/data.csv', 'r');
// $one = fgetcsv($handler);
// $two = fgetcsv($handler);
// $three = fgetcsv($handler);

// var_dump($one);
// var_dump($two);
// var_dump($three);

$question = nl2br(htmlspecialchars($data[1]));

$answers = [
    'A' => htmlspecialchars($data[2]),
    'B' => htmlspecialchars($data[3]),
    'C' => htmlspecialchars($data[4]),
    'D' => htmlspecialchars($data[5]),
];

$correctAnswer = htmlspecialchars(strtoupper($data[6]));
$correctAnswerValue = $answers[$correctAnswer];
$explanation = nl2br(htmlspecialchars($data[7]));


include __DIR__.'/../template/question.tpl.php';

