<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
</head>
<body>
    
<div class="containerreg">
        <div class="header">
            <div class="text-center">
                <h2>Camionta Express</h2>
            </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">

            <div class="user line-input">
                <input type="text" placeholder="Nombre" name="nombre">
            </div>
            
            <div>
                <input type="text" placeholder="Apellido" name="apellido">
            </div>
            <div>
                <input type="text" placeholder="Correo" name="email">
            </div>
            <div class="password line-input">
                <input type="password" name="password" placeholder="Ingrese la contraseña">
                <input type="password" name="password2" placeholder="Confirme la contraseña">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="text-center">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <div class="text-center">
                <input type="submit" value="Registrarse">
            </div>           

            
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>