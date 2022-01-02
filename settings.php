<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="./css/settings.css?<?=filemtime("./css/settings.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/settings.js?<?=filemtime("./js/settings.js")?>" defer></script>
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
    <section class="main">
        <br>
        <!-- avatar -->
        <form action="./php/avEdit.php" method="POST" id="av" enctype="multipart/form-data">
            <label for="av-inp" class="label-av-inp">Change Avatar</label>
            <input type="file" id="av-inp" name="av-inp" style="display:none;">
            <input type="submit" value="send" style="opacity:0" id="submit">
        </form>
        <br><br>
        <p class="btn" id="update">Update Password</p>
        <br><br>
        <p class="btn" id="delete">Delete Account</p>
        <br><br>
        <p class="btn" id="logout">Logout</p>
        <br><br>
    </section>
</body>
</html>