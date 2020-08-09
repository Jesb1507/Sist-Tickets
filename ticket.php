<?php include('./header.php');
include('./database.php');
date_default_timezone_set('America/Santo_Domingo');
$time = date("d/m/yy H:i:s");
$fecha= date("yy/m/d H:i:s");

$idruta=$_SESSION['idruta'];
$IDuser=$_SESSION['IDuser'];
$precio=$_SESSION['precio'];
$sql="
INSERT INTO `tickets`
(
    `idfactura`, 
    `idruta`, 
    `iduser`, 
    `fecha`, 
    `precio`
) VALUES (
    NULL,
    '$idruta',
    '$IDuser',
    '$fecha',
    '$precio')";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
</head>
<body background="bg2.png">
    <div class="containerlog text-center">
        <div class="header2">
        <h3>LA CAMIONTA EXPRESS</h3>
        </div>
        <br><br><br>
        <h5>Fecha: <?php echo $time; ?> </h5> 
        <h5>Codigo de ruta: <?php echo $_SESSION['idruta']; ?> </h5>
        <h5>Id Usuario: <?php echo $_SESSION['IDuser']; ?> </h5>
        <h5>Usuario: <?php echo $_SESSION['Nuser']; ?> </h5>
        <h5>Ruta: <?php echo $_SESSION['ruta']?>   <?php echo $_SESSION['hora']?></h5> 
        <h5>Precio: <?php echo $_SESSION['precio']; ?> </h5>
        <br><br>
        <div class="header"></div>

    
        <!-- <a class="btn" role="button" href="">Descargar</a> -->
    </div>
</body>
</html>