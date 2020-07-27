
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
    <h1>Registro</h1>
    <span>o <a style="color: red;" href="login.php">Iniciar sesion</a> </span>
    <div class = "containerreg">
    <form action="signup.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre"> 
        <input type="text" name="lastname" placeholder="Apellido">
        <input type="text" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="Ingrese la contraseña">
        <input type="password" name="confirmpassword" placeholder="Confirme la contraseña">
        <input type="submit" value="Registrarse">
    </form>
    </div>

</body>
</html>