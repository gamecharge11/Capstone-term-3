const form = document.forms[0];
var time = new Date();
edited = time.toLocaleString().replace(',', '')

form.addEventListener('submit', function (e) {
    e.preventDefault();
    document.getElementById('time').value = edited;
    let data = new FormData(this);
    $.ajax({
        url: "./php/signup.php",
        type: "POST",
        data: data,
        success: function (msg) {
            document.getElementById('final').style.display = 'block';
            if (msg == '1') {
                document.getElementById('final').innerHTML = "Success! Please wait while we redirect you."
                setTimeout(function () {
                    location.href = "home.php"
                }, 1000)
            } else if (msg == '0') {
                document.getElementById('final').innerHTML = "There was an error creating your account."
            } else {
                alert(msg)
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
})