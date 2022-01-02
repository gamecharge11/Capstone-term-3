<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
     <link href="./css/ask.css?<?=filemtime("./css/ask.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/ask.js?<?=filemtime("./js/ask.js")?>" defer></script>
</head>
<body>
    <nav class="nav">
        <div class="left"><img src="./Assets/logo-nav.png" alt="CodePoint Logo" class="logo-nav"></div>
        <div class="right">
            <a href="home.php" class="nav-link">Home</a>
            <a href="ask.php" class="nav-link">Ask a Question</a>
            <a href="#" class="nav-link">Contact</a>
        </div>
    </nav>
    <h1 class="title">Ask a Question</h1>
    <br>
    <div class="main">
        <div class="left">
            <form action="./php/askScript.php" method="POST">
                <label for="title" class="label">Title</label>
                <textarea type="text" name="title" id="title" class="title-inp" placeholder="Ex: Get first element from array"></textarea>
                <br>
                <label for="description" class="label">Describe Your Issue</label>
                <textarea type="text" name="description" id="description" class="description-inp" placeholder="Ex: While accessing the first item it returns undefined"></textarea>
                <br>
                <label for="code" class="label">Code</label>
                <textarea type="text" name="code" id="code" class="code-inp" placeholder="Send a GitHub link, code pen link or just paste the code where you are having the issue here."></textarea>
                <br>
                <label for="language" class="label-inline">Select Language:</label>
                <select name="language" id="language">
                    <option value="py">Python</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="js">JS</option>
                    <option value="php">PHP</option>
                </select>
                <br><br><br>
                <input type="submit" value="Post" class="btn">
            </form>
        </div>
        <div class="right">
            <img src="./Assets/img-ask.png" class="img" alt="Person Thinking">
        </div>
    </div>
</body>
</html>