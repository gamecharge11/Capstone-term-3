<?php 
    include '../config/conf.ini.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $time = $_POST['time'];
    $check = mysqli_query($con,"SELECT * from users WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($check) > 0) {
        $row = $check -> fetch_assoc();
        setcookie("email", $email, time() + (86400 * 30), "/");
        $_SESSION['logged'] = 'true';
        echo "1";
    } else {
        echo "0";
    }
?>