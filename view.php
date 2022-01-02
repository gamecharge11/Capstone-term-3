<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
    <link href="./css/view.css?<?=filemtime("./css/view.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/view.js?<?=filemtime("./js/view.js")?>" defer></script>
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
        <br><br>
        <div class="top">
            <h1 class="title" id="title"></h1>
            <br>
            <p class="description" id="description"></p>
            <br>
            <div class="av-group">
                <img src="" alt="" id="av" class="av" onclick="redirect()" style="cursor:pointer;">
                <h3>&nbsp;&nbsp;Posted by<br><span id="username"><span></h3>
            </div>
            <br><br>
            <h2 id="title-cd">Code:</h2>
            <pre>
                <code class="code hljs language-js" id="code" style="padding:0;width:500px;margin:none;">
                    
                </code>
            </pre>
        </div>
        <br><br>
        <div class="bottom" id="generate-cont">
            
        </div>
    </div>
</body>
</html>