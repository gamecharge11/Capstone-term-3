<?php 
    include '../config/conf.ini.php';
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $email = mysqli_real_escape_string($con,$_COOKIE['email']);
    $de = mysqli_real_escape_string($con,$_POST['description']);
    $code = mysqli_real_escape_string($con,$_POST['code']);
    $lg = mysqli_real_escape_string($con,$_POST['language']);

    $query = mysqli_query($con,"INSERT INTO questions(email,title,de,code,lg) VALUES('$email','$title','$de','$code','$lg')");
    $getValQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $row = $getValQuery -> fetch_assoc();
    $asked = intval($row['asked']) + 1;
    echo $asked;
    $update = mysqli_query($con,"UPDATE users SET asked = '$asked' WHERE email = '$email'");
    if ($update) {
        include './uniquePage.php';
        echo "1";
        header('Location: ../ask.php?success');
    }
?>