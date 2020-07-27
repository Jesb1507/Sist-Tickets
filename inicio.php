<?php session_start();

    if(isset($_SESSION['email'])) {
        header('location: home.php');
    }else{
        header('location: login.php');
    }


?>