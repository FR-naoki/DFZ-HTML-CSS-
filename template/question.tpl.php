<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="questions.js" defer></script>
    <title>問題１｜ Quiz</title>
</head>
<body>
    <div id="main">
        <h1>Quiz</h1>
        <div class="section">
            <h2>問題１</h2>
            <p>
                <?php echo $question; ?>
            </p>
            <h3>選択肢</h3>
            <ol class="answers" data-id="question1">
                <li data-answer="A">HyperTextMakingLanguage</li>
                <li data-answer="B">HyperTextMarkupLanguage</li>
                <li data-answer="C">HonmaniTensaitekinaMajidesugoiLanguage</li>
                <li data-answer="D">そもそも略称ではない</li>
            </ol>
        </div>
        <div id="section-correct-answer">
            <h2>答え</h2>
            <p>
                <span id="correct-answer">B. HyperTextMarkupLanguage</span><br>
                これが間違えてたら「HTMLとは？」の動画を復習お願いします！
            </p>
        </div>
        <div class="section"> 
            <a href="http://127.0.0.1:5500/index.html">戻る</a>
        </div>
    </div>
</body>

</html>