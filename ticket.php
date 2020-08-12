<?php include('./header.php');
include('./database.php');
date_default_timezone_set('America/Santo_Domingo');
$time = date("d/m/yy H:i:s");
$fecha= date("yy/m/d H:i:s");

if(!isset($_SESSION['rol'])){
    header('location: logreq.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: logreq.php');
    }
}


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
        <footer>
            <div class="header2" >
                <div class="p-2 flex-fill bd-highlight bg-danger" >
                    <h3 align="center">¡Aviso!</h3>
                    <p align="center">Los tickets no tienen reembolso, favor estar en la empresa de 5 a 10 minutos antes de la hora de su viaje, gracias.</p>
                </div>
            </div>
        </footer>
    </div>

    

</body>
</html>