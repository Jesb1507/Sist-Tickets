<?php session_start();

    if(isset($_SESSION['email'])) {
        header('location: index.html');
    }else{
        header('location: login.php');
    }


?>