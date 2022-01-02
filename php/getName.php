<?php 
    include '../config/conf.ini.php';
    $email = $_COOKIE['email'];
    $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $row = $query -> fetch_assoc();
    echo $row['username'];
?>