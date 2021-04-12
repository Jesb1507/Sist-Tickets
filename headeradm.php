<?php
  include('./consulta.php');
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camionta Express</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
  <nav class="navbar navbar-expand-lg navbar-light bg-80deg,#14c414,#09bcf3 ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" style="color:rgb(47, 224, 186)" href="./home.php">La Camionta Express</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item active">
          <a class="nav-link" style="color:rgb(47, 224, 186)" href="./estados_viajes.php">Horarios</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" style="color:rgb(47, 224, 186)" href="./reportes.php">Reportes</a>
        </li>
      </ul>

      <div class="dropdown" style="align:right">
          <a class="btn dropdown-toggle" style="color:rgb(47, 224, 186)" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
            <?php echo $_SESSION['Nuser']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="./logout.php">Cerrar sesion</a>
          </div>
        </div>
  </nav>
  </header>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- actualizar pagina -->
  <script type="text/javascript">
    function actualizar(){location.reload(true);}
      
    setInterval("actualizar()",600000);
  </script>
</body>

</html>