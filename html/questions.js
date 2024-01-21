const answersList = document.querySelectorAll('ol.answers li');


function checkClickedAnswer(event) {
    const clickedAnswerElement = event.currentTarget;
    const selectedAnswer = clickedAnswerElement.dataset.answer;
    const questionId = clickedAnswerElement.closest(`ol.answers`).dataset.id;

    // フォームデータの入れ物を作る
    const formData = new FormData();

    // 送信したい値を追加
    formData.append('id', questionId);
    formData.append('selectedAnswer', selectedAnswer);

    // xhr = XMLHttpRequestの頭文字です
    const xhr = new XMLHttpRequest();

    // HTTPメソッドをPOSTに指定、送信するURLを指定
    xhr.open('POST', 'answer.php');

    // フォームデータを送信
    xhr.send(formData);

    // loadendはリクエストが完了したときにイベントが発生する
    xhr.addEventListener('loadend', function (event) {
        /** @type {XMLhttpRequest} */
        const xhr = event.currentTarget;
        // リクエストが成功したかステータスコードで確認        
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.response);
            // 答えが正しいか判定
            const result = response.result;
            const correctAnswer = response.correctAnswer;
            const correctAnswerValue = response.correctAnswerValue;
            const explanation = response.explanation;

            // 画面表示
            displayResult(result, correctAnswer, correctAnswerValue, explanation);    
        } else {
            // エラー
            alert('Error:回答データの取得に失敗しました');
        }

    });
}

function displayResult(result, correctAnswer, correctAnswerValue, explanation) {
    let message;
    let answerColorCode;
    if (result) {
        message = `正解です！おめでとう`;
        answerColorCode = ``;
    } else {
        message = `残念！不正解です！`;
        answerColorCode = `#F05959`;
    }

    alert(message);
    
    // 正解の内容をHTMLに組み込む
    document.querySelector('span#correct-answer').innerHTML = correctAnswer + '. ' + correctAnswerValue;
    document.querySelector('span#explanation').innerHTML = explanation;
    
    // 色を変更（間違っていた時だけ色が変わる）
    document.querySelector('span#correct-answer').style.color = answerColorCode;
    // 答え全体を表示
    document.querySelector('div#section-correct-answer').style.display = `block`;
}

answersList.forEach((li) => { li.addEventListener(`click`, checkClickedAnswer) });














// const weight = 58;
// const height = 1.65;
// const bmi = weight / (height ** 2);
// console.log(bmi);


// function calculateBmi() {
//     const weight = 58;
//     const height = 1.65;
//     const bmi = weight / (height ** 2);
//     return bmi
// }


// function calculateBmi(weight, height) {
//     return weight / (height ** 2);
// }

// bmi = calculateBmi(62, 1.67);

// if (bmi < 18.5) {
//     console.log(`痩せすぎです`, bmi);    
// } else if (bmi >= 25.0) {
//     console.log(`太りすぎです`, bmi);    
// } else {
//     console.log(`普通です`, bmi);
// }

// function showAlert() {
//     alert(`クリックしました`);
// }

// document.querySelector(`li`).addEventListener(`click`, showAlert)


