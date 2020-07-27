<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: inicio.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email   = $_POST['email'];
        $password = $_POST['password'];
        
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
        $statement = $conexion->prepare('
        SELECT * FROM usuarios WHERE email = :email AND password = :password'
        );
        
        $statement->execute(array(
            ':email' => $email,
            ':password' => $password
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['email'] = $usuario;
            header('location: home.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
    
require 'FE/login-vista.php';


?>