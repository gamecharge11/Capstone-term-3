<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Questions</title>
    <link href="./css/browse.css?<?=filemtime("./css/browse.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/browse.js?<?=filemtime("./js/browse.js")?>" defer></script>
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
    <div class="main">    
        <div class="top">
            <h1 class="title">Questions</h1>
            <br>
            <input type="text" name="search" id="search" class="search" placeholder="Search">
        </div>
        <br><br>
        <div class="questions" id="questions">
            
        </div>
    </div>
</body>
</html>