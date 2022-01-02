<?php 
    include '../config/conf.ini.php';
    $Aid = $_POST['Aid'];
    $Qid = $_POST['Qid'];
    $queryEm = mysqli_query($con,"SELECT * FROM questions WHERE id = '$Qid'");
    $row = $queryEm -> fetch_assoc();
    if ($_COOKIE['email'] == $row['email']) {
        $answerQuery = mysqli_query($con,"SELECT * FROM answers WHERE id = '$Aid'");
        $assocAnswer = $answerQuery -> fetch_assoc();
        $email = $assocAnswer['email'];
        $getValQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $row = $getValQuery -> fetch_assoc();
        $query = mysqli_query($con,"UPDATE answers SET correct = 'false' WHERE id = '$Aid'");
        $email = $assocAnswer['email'];
        $rep = intval($row['reputation']) - 3;
        $update = mysqli_query($con,"UPDATE users SET reputation = '$rep' WHERE email = '$email'");
        $cr = intval($row['correct']) - 1;
        $updateCr = mysqli_query($con,"UPDATE users SET correct = '$cr' WHERE email = '$email'");
        if ($query) {
            echo "1";
        }
    }
?>