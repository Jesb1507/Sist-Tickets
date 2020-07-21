<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register Magtimus</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
    
<div class="containerreg">
        <div class="header">
            <div class="logo-title">
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
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <input type="submit" value="Registrarse">
            
        </form>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>