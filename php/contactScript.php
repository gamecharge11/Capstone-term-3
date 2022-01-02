<?php 
    include '../config/conf.ini.php';
    $name = $_POST['name'];
    $about = $_POST['about'];
    $explanation = $_POST['explanation'];
    $email = $_COOKIE['email'];

    $query = mysqli_query($con,"INSERT INTO contact(`about`,`name`,`email`,`explanation`) VALUES('$about','$anme','$email','$explanation')");
    if ($query) {
        header('Location: ../contact.php?success');
    }
?>