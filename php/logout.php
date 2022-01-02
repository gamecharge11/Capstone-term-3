<?php 
    unset($_COOKIE['email']);
    setcookie('email', '', time() - 3600, '/');
    unset($_COOKIE['av']);
    setcookie('av', '', time() - 3600, '/');
    echo "1";
?>