<?php 
    $con = mysqli_connect("localhost","root","","codepoint");
    $curTime = $_POST['time'];
    $email = $_COOKIE['email'];
    $query = mysqli_query($con,"UPDATE users SET online = '$curTime' WHERE email = '$email'");
?>