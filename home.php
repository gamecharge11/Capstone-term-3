<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Pont</title>
    <link href="./css/home.css?<?=filemtime("./css/home.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/home.js?<?=filemtime("./js/home.js")?>" defer></script>
</head>
<body>
    <nav class="nav">
        <div class="left"><img src="./Assets/logo-nav.png" alt="CodePoint Logo" class="logo-nav"></div>
        <div class="right">
            <a href="home.php" class="nav-link">Home</a>
            <a href="ask.php" class="nav-link">Ask a Question</a>
            <a href="contact.php" class="nav-link">Contact</a>
        </div>
    </nav>
    <div class="wrap">
        <h1 class="header">
            Welcome,<br>
            <span class="ds-name" id="ds-name"><?= 
                // display name
                include './config/conf.ini.php';
                $email = $_COOKIE['email'];
                $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
                $row = $query -> fetch_assoc();
                echo $row;
            ?></span>
        </h1>
        <div class="opt">
            <div class="group" onclick="location.href='settings.php'">Settings</div>
            <div class="group" onclick="location.href=`users/${username}.html`">My Profile</div>
            <div class="group" onclick="location.href=`browse.php`">Browse Questions</div>
        </div>
    </div>

</body>
</html>