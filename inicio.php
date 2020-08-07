<?php session_start();

    if(isset($_SESSION['rol'])) {
        header('location: home.php');
    }else{
        header('location: index.html');
    }


?>