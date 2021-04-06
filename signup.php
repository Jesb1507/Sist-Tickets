<?php session_start();
if(isset($_SESSION['rol'])) {
    header('location: logreq.php');
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);
    $nivel_acceso =(2);
    $error = '';
    
    if (empty($email) or empty($nombre) or empty($apellido) or empty($password) or empty($password2)){
        
        $error .= '<i>Favor de rellenar todos los campos</i>';
    }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
        
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email LIMIT 1');
        $statement->execute(array(':email' => $email));
        $resultado = $statement->fetch();
        
                    
        if ($resultado != false){
            $error .= '<i>Este correo ya está registrado</i>';
        }
        
        if ($password != $password2){
            $error .= '<i> Las contraseñas no coinciden</i>';
        }
        
        
    }
    
    if ($error == ''){
        $statement = $conexion->prepare('INSERT INTO usuarios (iduser,nombre, apellido, email, password, nivel_acceso) VALUES (null, :nombre, :apellido, :email, :password, :nivel_acceso)');
        $statement->execute(array(
            
            ':email' => $email,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':password' => $password,
            ':nivel_acceso' => $nivel_acceso
            
        ));
        
        $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        
    }
}


require 'FE/Registro.php';

?>