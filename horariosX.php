<?php
  include('./consulta.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CamiontaExpress</title>
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
      <a class="btn"style="color:rgb(47, 224, 186)"  role="button" href="signup.php">Registrarse</a>
    </div>
    <div class="px-2">
      <a class="btn" style="color:rgb(47, 224, 186)" role="button" href="logreq.php">Iniciar Sesion</a>
    </div>
  </nav>    
  </div>
  </div>
</div>
</header>



<div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1>Horarios</h1>
    </div>
        <div class="panel-body">
        <br>
        <hr>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Id Ruta</th>
                    <th>Ruta</th>
                    <th>Hora</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $query = lista_idrutas();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idrutas']."</td>
                                <td>".$row['ruta']."</td>
                                <td>".$row['hora']."</td>
                            </tr>

                        ";
                    }
                ?>


            </tbody>

        </table>

    </div>
</div>

<script type="text/javascript">
setTimeout("document.location=document.location", 60000);
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>