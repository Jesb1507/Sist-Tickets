<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=php_login_database;","root", "");
}catch (Exception $e){
    die("Connection Fail: ".$e->getMessage());
}
$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Usuario creado correctamente';
        } else {
            $message = 'Ha ocurrido un error, no se pudo crear el usuario';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <?php if(!empty($message)): ?>
        <p><?=$message?></p>
        <?php endif; ?>
    <h1 class="mt-5">REGISTRO</h1>
    <span style="color: white;">o <a style="color: red;" href="login.php">Iniciar sesion</a> </span>
    <div class = "containerreg">
        <form action="signup.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre"> 
            <input type="text" name="nombre" placeholder="Apellido">
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese la contraseña">
            <input type="password" name="confirmpassword" placeholder="Confirme la contraseña">
            <input type="submit" value="Registrarse">
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>