<?php 
    if (isset($_SESSION['logged'])) {
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Point</title>
    <link href="./css/style.css?<?=filemtime("./css/style.css")?>" rel="stylesheet" type="text/css" />
    <script src="./js/app.js?<?=filemtime("./js/app.js")?>" defer></script>
</head>

<body>
    <script>
        document.addEventListener("load", function () {
            <?php
                setcookie("email", "None", time() + (86400 * 30), "/");
            ?>
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
    <section class="main">
        <div class="section-left">
            <img src="./Assets/initial-logo.png" alt="" class="img-main">
        </div>
        <div class="section-right">
            <div class="wrap-form">
                <br>
                <h1 class="heading">Sign up</h1>
                <br>
                <form action="./php/signup.php" method="POST" class="signup-form" id="signup-form">
                    <div class="group">
                        <label for="username" class="form-signup-label">Username</label>
                        <input type="text" name="username" class="form-signup-input" required>
                    </div>
                    <div class="group">
                        <label for="email" class="form-signup-label">Email</label>
                        <input type="email" name="email" class="form-signup-input" required>
                    </div>
                    <div class="group">
                        <label for="password" class="form-signup-label">Password</label>
                        <input type="password" name="password" class="form-signup-input" required>
                    </div>
                    <input type="hidden" name="time" id="time" value="">
                    <input type="submit" value="Sign Up" class="btn-submit">
                    <span class="final" id="final"></span>
                </form>
                <h1 class="login-redirect">Already have an account? <a href="./login.php">Login</a></h1>
            </div>
        </div>
    </section>
</body>

</html>