<?php 
    include '../config/conf.ini.php';

    $old = $_POST['old'];
    $new = $_POST['new'];
    $email = $_COOKIE['email'];

    $query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
    
    $row = $query -> fetch_assoc();
    $password = $row['password'];

    if ($password == $old) {
        $update = mysqli_query($con,"UPDATE users SET password='$new' WHERE email='$email'");
        if ($update) {
            echo "1";
        } else {
            echo "0";
        }
    } else {
        echo "2";
    }
?>