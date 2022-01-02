<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="./css/contact.css?<?=filemtime("./css/contact.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/contact.js?<?=filemtime("./js/contact.js")?>" defer></script>
</head>
<body>
    <script>
        window.addEventListener('load', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const success = urlParams.get('success');

            if (success == '') {
                alert('Success! We will get back to you as soon as we can in email.')
                location.href="home.php"
            }
        })
    </script>
    <nav class="nav">
        <div class="left"><img src="./Assets/logo-nav.png" alt="CodePoint Logo" class="logo-nav"></div>
        <div class="right">
            <a href="home.php" class="nav-link">Home</a>
            <a href="ask.php" class="nav-link">Ask a Question</a>
            <a href="contact.php" class="nav-link">Contact</a>
        </div>
    </nav>
    <h1 class="title">Contact Us</h1>
    <div class="main">
        <br><br>
        <form action="./php/contactScript.php" method="POST" id="form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="inp">
            <br>
            <label for="about" class="required">About</label>
            <input type="text" name="about" id="about" class="inp" required>
            <br>
            <label for="explanation" class="required">Description</label>
            <textarea name="explanation" id="explanation" class="inp-large" placeholder="Describe your issue" required></textarea>
            <br><br>
            <input type="submit" value="Send" class="btn">
        </form>
    </div>
</body>
</html>