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

<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand"style="color:rgb(47, 224, 186)"  href="./index.php">La Camionta Express</a>      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" style="color:rgb(47, 224, 186)" href="./index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"style="color:rgb(47, 224, 186)"  href="./horariosX.php">Horarios</a>
        </li>
      </ul>
    <div class="px-2">
      <a class="btn"style="color:rgb(47, 224, 186)"  role="button" href="./inicio.php">Inicio</a>
    </div>
    <div class="px-2">
      <a class="btn" style="color:rgb(47, 224, 186)" role="button" href="./logreq.php">Iniciar Sesion</a>
    </div>
  </nav>    
  </div>
  </div>
</div>
</header>

<div class="containerreg">
        <div class="header">
            <div class="text-center">
                <h2>Camionta Express</h2>
            </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="user line-input">
                <input type="text" style="color:rgb(47, 224, 186)" placeholder="Nombre" name="nombre">
            </div>
            
            <div>
                <input type="text" style="color:rgb(47, 224, 186)" placeholder="Apellido" name="apellido">
            </div>
            <div>
                <input type="text" style="color:rgb(47, 224, 186)" placeholder="Correo" name="email">
            </div>
            <div class="password line-input">
                <input type="password" style="color:rgb(47, 224, 186)" name="password" placeholder="Ingrese la contraseña">
                <input type="password" style="color:rgb(47, 224, 186)" name="password2" placeholder="Confirme la contraseña">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="text-center">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <div class="text-center">
                <input type="submit" style="color:rgb(47, 224, 186)" value="Registrarse">
            </div>           
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>