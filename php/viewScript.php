<?php 
    error_reporting(0);
    include '../config/conf.ini.php';
    $id = $_POST['id'];
    $queryQuestion = mysqli_query($con,"SELECT * FROM questions WHERE id = '$id'");
    $assocQuestion = $queryQuestion -> fetch_assoc();

    $email = $assocQuestion['email'];

    $usernameQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $assocEmail = $usernameQuery -> fetch_assoc();
    $username = $assocEmail['username'];

    $avatarQuery = mysqli_query($con,"SELECT * FROM avatar_path WHERE email = '$email'");
    $assocAv = $avatarQuery -> fetch_assoc();
    $path = '';
    if (isset($assocAv['path'])) {
        $path = './uploads/'.$assocAv['path'];
    } else {
        $path = 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png';
    }


    $code = $assocQuestion['code'];
    $language = $assocQuestion['lg'];

    echo $assocQuestion['title'].'------------'.$assocQuestion['de'].'------------'.$path.'------------'.$username.'------------'.$code.'------------'.$language;
?>