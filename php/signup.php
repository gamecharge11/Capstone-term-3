<?php 
    include '../config/conf.ini.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $time = $_POST['time'];
    $check = mysqli_query($con,"SELECT * from users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "0";      
    } else {
        $namecheck = mysqli_query($con,"SELECT * from users WHERE username = '$username'");
        if (mysqli_num_rows($namecheck) > 0) {
            echo "0";
        } else {
            $query = mysqli_query($con,"INSERT INTO users (username,password,email,reputation,online,asked,attempted,correct) VALUES('$username','$password','$email','0','$time','0','0','0')");
            setcookie("email", $email, time() + (86400 * 30), "/");
            $_SESSION['email'] = $email;
            include './uniquePage.php';
        }
    }
?>