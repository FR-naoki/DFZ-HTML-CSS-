<?php 

function loadTemplate($filename) {
    include __DIR__.'/../template/'.$filename.'.tpl.php';
}

function error404() {
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する
    header('Content-Type: text/html; charset=UTF-8');
    
    include __DIR__.'/../template/404.tpl.php';
    exit(0);
}




function fetchById($id) {
    // ファイルを開く
    $handler = fopen(__DIR__.'/data.csv', 'r');

    // データを取得
    $question = [];
    while ( $row = fgetcsv($handler)){
        if (isDataRow($row)) {
        if ($row[0] === $id) {
            $question = $row; 
            break;
        }
    }
    }

    // ファイルを閉じる
    fclose($handler);


    // データを返す
    return $question;
}

function isDataRow(array $row)
{
    // データの項目数が足りているか判定
    if (count($row) !== 8) {
        return false;
    }

    // データの項目の中身がすべて埋まっているか確認する
    foreach ($row as $value) {
        // 項目の値が空か判定
        if (empty($value)) {
            return false;
        }
    }

    // idの項目が数字ではない場合は無視する
    if (!is_numeric($row[0])) {
        return false;
    }

    // 正しい答えはa,b,c,dのどれか
    $correctAnswer = strtoupper($row[6]);
    $availableAnswers = ['A', 'B', 'C', 'D'];
    if (!in_array($correctAnswer, $availableAnswers)) {
        return false;
    }

    // すべてチェックが問題なければtrue
    return true;
}

// * 取得できたクイズのデータ1行を利用しやすいように連想配列に変換
// * 値をHTMLに組み込めるようにエスケープも行う
function generatedFormattedData($data) {
    $formattedData = [
        'id' => escape($data[0]),
        'question' => escape($data[1], true),
        'answers' => [
            'A' => escape($data[2]),
            'B' => escape($data[3]),
            'C' => escape($data[4]),
            'D' => escape($data[5]),
        ],
        'correctAnswer' => escape(strtoupper($data[6])),
        'explanation' => escape($data[7], true), 
    ];
    return $formattedData;
}

// * HTMLに組み込むために必要なエスケープ処理を行う
 function escape($data, $nl2br = false) {
    $convertedData = htmlspecialchars($data, ENT_HTML5);
    if ($nl2br) {
        return nl2br($convertedData);
    } 
    return $convertedData;
 }