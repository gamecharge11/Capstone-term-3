<?php 
    include '../config/conf.ini.php';
    $password = $_POST['password'];

    $email = $_COOKIE['email'];
    $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    if (!$query) {
        echo "0";
    } else {
        $row = $query -> fetch_assoc();

        if ($row['password'] == $password) {
            $delete = mysqli_query($con, "DELETE FROM users WHERE email = '$email'");
            setcookie("email", "", time() - 3600);
            setcookie("av", "", time() - 3600);
            if ($delete) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "2";
        }
    }
?>