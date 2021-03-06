$(function() {
    let score = $('#score').val();

    if (typeof(score) === 'undefined' || score === null) {
        score = 0;
    }

    let currentQuestion = $('#currentQuestion').val();

    if (typeof(currentQuestion) === 'undefined' || currentQuestion === null) {
        currentQuestion = 0;
    }

    $("#quiz_form").on("submit", function(e) {
        e.preventDefault();
        let correctAnswer = $('#picture').attr('alt');
        console.log(correctAnswer);
        currentQuestion++;

        let checkedRadio = $('input[name=option]:checked').val();
        if (checkedRadio === undefined) {
            $('#error_message').text('Please select an option to continue');
            return false;
        }

        if (checkedRadio === correctAnswer) {
            score++;
        }

        let returnData = [];
        returnData[0] = score;
        returnData[1] = currentQuestion;

        console.log(score);
        console.log(currentQuestion);

        $.ajax({
            type: "POST",
            url: "../Pages PHP/quiz_ajax.php",
            dataType: "text",
            data: {
              currentQuestion: currentQuestion,
              score: score
            },
            success: function() {
                location.reload();
            }
        });
    });
});