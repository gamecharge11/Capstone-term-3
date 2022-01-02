// * SEND REQUEST TO PHP TO GENERATE ALL THE HTML FOR THE QUESTIONS FROM THE DATABASE

window.addEventListener('load', function () {
    $.ajax({
        url: "./php/getQuestions.php",
        type: "POST",
        data: {
            none: "true"
        },
        success: function (data) {
            // * APPEND RETURNED HTML TO #QUESTIONS DIV
            document.getElementById('questions').innerHTML = data
        }
    });
})

// * SEARCH TEXT BOX FUNCTIONING

const search = document.getElementById('search')

search.addEventListener('keyup', function (e) {
    if (e.key == 'Enter') {
        let val = this.value
        $.ajax({
            url: "./php/search.php",
            type: "POST",
            data: {
                value: val
            },
            success: function (data) {
                // * APPEND RETURNED HTML TO #QUESTIONS DIV
                document.getElementById('questions').innerHTML = data
            }
        });
    }
})