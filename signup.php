  
<?php session_start();

if(isset($_SESSION['email'])) {
    header('location: inicio.php');
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password2 = $_POST['$password2'];
    
    $password = hash('sha512', $password);
    // $password2 = hash('sha512', $password2);
    
    $error = '';
    
    if (empty($email) or empty($nombre) or empty($apellido) or empty($clave) or empty($clave2)){
        
        $error .= '<i>Favor de rellenar todos los campos</i>';
    }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
        
        $statement = $conexion->prepare('SELECT * FROM login WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();
        
                    
        if ($resultado != false){
            $error .= '<i>Este correo ya está registrado</i>';
        }
        
        if ($password != $password2){
            $error .= '<i> Las contraseñas no coinciden</i>';
        }
        
        
    }
    
    if ($error == ''){
        $statement = $conexion->prepare('INSERT INTO usuarios (id,nombre, apellido, email, password) VALUES (null, :nombre, :apellido, :email, :password)');
        $statement->execute(array(
            
            ':email' => $email,
            ':nombre' => $nombre,
            'apellido' => $apellido,
            ':password' => $password
            
        ));
        
        $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
    }
}


require 'FE/Registro.php';

?>