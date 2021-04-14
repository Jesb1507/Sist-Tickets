<html>
    <script type="text/javascript">
        function maxcap(){
        var mensaje = confirm("Lo sentimos, este viaje ya ha alcanzado su capacidad maxima");
        if (mensaje){
            window.location="horarios.php";  
        }
        else {
            window.location="horarios.php"; 
        }
        }
    </script>

</html>
<?php
    include('./header.php');
    header('enviar-email.php');

    try{
        $mysqli = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }
    
    if(!isset($_SESSION['rol'])){
        header('location: logreq.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: logreq.php');
        }
    }

    $usatord = 60;
    $montousa = $_SESSION['precio'] / $usatord;


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        
        $iduser = $_SESSION['IDuser'];
        $NombreT = $_POST['NombreT'];
        $NumeroT = $_POST['NumeroT'];
        $FechaT = $_POST['FechaT'];
        $idrutas= $_SESSION['idruta'];
        $precio=$_SESSION['precio'];
        

        $error = '';
        
        if (empty($FechaT) or empty($NombreT) or empty($NumeroT)){
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }
        if($error == ''){
            
            $error .= '<i style="color: green;">Compra realizada exitosamente</i>';
           
            $query2=$mysqli->prepare('SELECT * FROM usuarios WHERE iduser = :iduser');
            $query2->execute(['iduser' => $iduser]);
            $row2 = $query2->fetch(PDO::FETCH_NUM);

            $puntos = $row2[5];
            $puntosUp = $puntos + 5;

            $Upoint = $mysqli->prepare("UPDATE `usuarios` SET `puntos`= :puntosUp WHERE `iduser`=:iduser");
            $Upoint->execute(array('puntosUp'=>$puntosUp, ':iduser'=>$iduser));

           
            $query3=$mysqli->prepare('SELECT * FROM rutas WHERE idrutas = :idrutas');
            $query3->execute(['idrutas' => $idrutas]);
            $row3 = $query3->fetch(PDO::FETCH_NUM);
            

            $capacidad = $row3[4]; 
            $capacidadUp = $capacidad + 1;

            if ($capacidadUp>25) {
                echo '<script type="text/javascript">maxcap();</script>'; 
            }else {
                $fecha = date("Y-m-d H:i:s");
                $sql= "INSERT INTO `tickets`(`idfactura`,`idruta`,`iduser`,`fecha`,`precio`) VALUES (NULL, $idruta, $IDuser, '$fecha', '$precio')";
                $Ucapidad = $mysqli->prepare("UPDATE `rutas` SET `capacidad`= :capacidadUp WHERE `idrutas`=:idrutas");
                $Ucapidad->execute(array('capacidadUp'=>$capacidadUp, ':idrutas'=>$idrutas));
                header('location: ticket.php');  
            
            }
            

        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['idruta']; ?></title>
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt3nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="alertifyjs/alertify.js"></script>
    <link rel="stylesheet" href="./style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $('#date').mask('00/00');
            $('#cardno').mask('0000-0000-0000-0000');
        });
    </script>
</head>
<body>
<div class="containerreg">
    <br><br><br><br><br><br><br>
        <div class="header">
            <div class="text-center">
                <h2>La CamiontaExpress</h2>
                <h5>Codigo de ruta: <?php echo $_SESSION['IDuser']; ?> </h5> 
                <h5>Usuario: <?php echo $_SESSION['IDuser']; ?> </h5>
                <h5>Precio: <?php echo $montousa * $usatord; ?>$ </h5>
            </div>
        </div>
        <div class="header">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formpago" class="form">

            <div class="user line-input">
                <input type="text" min="0" maxlength="20" placeholder="Nombre del titular" name="NombreT">
            </div>
            <div>
                <input name="NumeroT" type="text" min="0" maxlength="16" placeholder="Numero de la tarjeta" id="cardno">
            </div>
            <div>
                <input type="text" min="0" placeholder="Fecha expiración" maxlength="4" name="FechaT" id="date" title="MM/YY">
            </div>
            <div>
                <input type="text" min="0" maxlength="3" placeholder="Codigo CVC" name="Codigocvv" title="000">
            </div>
            <input type="submit" style="color:rgb(47, 224, 186)" value="Comprar"> 
        </div>
        </form>
        <div id="smart-button-container">
        <div style="text-align: center;">
        <div id="paypal-button-container"></div>
        </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AU9bgZD2AM91o0go7-Z3i-JeXnRvgCURbvAy6sqvz0qLlG_R4PWCqpEtyGV3qQoiUUOda8lZlOIJ-orE&currency=USD" data-sdk-integration-source="button-factory"></script>
        <script>
            var monto = <?php echo $_SESSION['precio'] / $usatord; ?>;
            function initPayPalButton(){
                paypal.Buttons({
                    style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'buynow',
                    
                    },

                    createOrder: function(data, actions) {
                    return actions.order.create({

                        purchase_units: [{"amount":{"currency_code":"USD","value": monto}}]
                    });
                    },

                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                        window.location="pagoefect.php";  
                    });
                    },

                    onError: function(err) {
                    console.log(err);
                    }
                }).render('#paypal-button-container');
            }
            initPayPalButton();
        </script>

        <?php if(!empty($error)): ?>
            <script>
                alertify.alert('La CamiontaExpress', 'Por Favor Rellenar Todos los Campos', function(){ alertify.success('Ok'); });
            </script>
        <?php endif; ?>
        
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
    <script>
        window.addEventListener("beforeunload",function(){
            alert('Hola');
        });
    </script>
</html>
