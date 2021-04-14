<?php include('./header.php');
     try{
        $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
        }catch(PDOException $message_error){
            echo "Error: " . $prueba_error->getMessage();
        }
    
date_default_timezone_set('America/Santo_Domingo');
$time = date("d/m/Y H:i:s");
$fecha = date("Y-m-d H:i:s");

$idruta=$_SESSION['idruta'];
$IDuser=$_SESSION['IDuser'];
$precio=$_SESSION['precio'];




$idt = $conexion->prepare('SELECT * FROM tickets WHERE idruta= :idruta AND iduser= :IDuser AND fecha = :fecha');
$idt->execute([ 'idruta' => $idruta, 'IDuser' => $IDuser, 'fecha' => $fecha ]);
$row = $idt->fetch(PDO::FETCH_NUM);

if($row == true){
$idticket= $row[0];
$_SESSION['idticket'] = $idticket;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="alertifyjs/alertify.js"></script>
    <script src="js/qrcode.min.js"></script>
    <script type="text/javascript" src="/js/article_menu.js"></script>
</head>
<body>



<div class="containerlog">
        
        <div class="header">
            <h3>LA CAMIONTA EXPRESS</h3>
        </div>
        <div class="header">
            <h5>Fecha: <?php echo $fecha; ?> </h5>
            <h5>Id Ticket: <?php echo $_SESSION['idticket']; ?> </h5> 
            <h5>Codigo de ruta: <?php echo $_SESSION['idruta']; ?> </h5>
            <h5>Id Usuario: <?php echo $_SESSION['IDuser']; ?> </h5>
            <h5>Usuario: <?php echo $_SESSION['Nuser']; ?> </h5>
            <h5>Ruta: <?php echo $_SESSION['ruta']?>   <?php echo $_SESSION['hora']?></h5> 
            <h5>Precio: <?php echo $_SESSION['precio']; ?> </h5>
        <br>
        <div align="center" id="qrcode"></div>
            <script type="text/javascript">
                new QRCode(document.getElementById("qrcode"), '(<?php echo 'Codigo de ticket ',$_SESSION['idticket'], 'Ruta: ', $_SESSION['ruta']; ?>)' );
                
            </script>    
        </div>
    </div>
    
<script>
    alertify.alert('¡Aviso!', 'Los tickets no tienen reembolso, favor estar en la empresa de 5 a 10 minutos antes de la hora de su viaje, gracias', function(){ alertify.success('Ok'); });
</script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

