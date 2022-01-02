<?php 
    include '../config/conf.ini.php';
    $answer = $_POST['ans'];
    $id = $_POST['id'];
    $email = $_COOKIE['email'];
    $query = mysqli_query($con,"INSERT INTO answers (questionId,email,answer,correct) VALUES('$id','$email','$answer','false')");
    if ($query) {
        $email = $_COOKIE['email'];
        $rowQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $row = $rowQuery -> fetch_assoc();
        $attempted = intval($row['attempted']) + 1;
        $reputation = intval($row['reputation']) + 1;
        $update = mysqli_query($con,"UPDATE users SET attempted = '$attempted' WHERE email = '$email'");
        $updateRep = mysqli_query($con,"UPDATE users SET reputation = '$reputation' WHERE email = '$email'");
        if ($update) {
            include './uniquePage.php';
            echo "1";
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
?>