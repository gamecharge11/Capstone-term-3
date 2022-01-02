<?php 
    include '../config/conf.ini.php';
    if (isset($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
        $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $row = $query -> fetch_assoc();
    }
?>