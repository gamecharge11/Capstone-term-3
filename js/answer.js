var searchParams = new URLSearchParams(window.location.search);
var questionId = searchParams.get('q');

const sumbit = document.getElementById('sumbit');

submit.onclick = () => {
    const answer = document.getElementById('answer').value;
    $.ajax({
        url: "./php/answerScript.php",
        type: "POST",
        data: {
            ans: answer,
            id: questionId
        },
        success: function (data) {
            if (data == 11) {
                alert('Success!');
                location.href = "./home.php"
            } else if (data == 0) {
                alert('An Error Occcured')
            } else {
                alert('Error: ' + data);
            }
        }
    });
}