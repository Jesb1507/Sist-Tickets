<?php
    include('./header.php');
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }
    // include('./ruta.php');


    if(!isset($_SESSION['rol'])){
        header('location: logreq.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: logreq.php');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $iduser = $_SESSION['IDuser'];
        $NombreT = $_POST['NombreT'];
        $NumeroT = $_POST['NumeroT'];
        $FechaT = $_POST['FechaT'];
       
        $error = '';
        
        if (empty($FechaT) or empty($NombreT) or empty($NumeroT)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }
        if($error == ''){      

            $statement = $conexion->prepare('INSERT INTO metodopago (idmpago, iduser, nombre_titular, codigotarj, fechaventarj) VALUES (null, :iduser, :nombre_titular, :codigotarj, :fechaventarj)');
            $statement->execute(array(
                    
                ':iduser' => $iduser,
                ':nombre_titular' => $NombreT,
                ':codigotarj' => $NumeroT,
                ':fechaventarj' => $FechaT
                
            ));

            $error .= '<i style="color: green;">Compra realizada exitosamente</i>';
           
            $query2=$conexion->prepare('SELECT * FROM usuarios WHERE iduser = :iduser');
            $query2->execute(['iduser' => $iduser]);
            $row2 = $query2->fetch(PDO::FETCH_NUM);

            $puntos = $row2[5];
            $puntosUp = $puntos + 5;
           
            
            $Upoint = $conexion->prepare("UPDATE `usuarios` SET `puntos`= :puntosUp WHERE `iduser`=:iduser");
            $Upoint->execute(array('puntosUp'=>$puntosUp, ':iduser'=>$iduser));

            sleep(2);
            header('location: ticket.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compra Ticket</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
</head>
<body background="bg2.png">
<div class="containerreg">
        <div class="header">
            <div class="text-center">
                <h2>Compra Ticket</h2>
                <h5>Codigo de ruta: <?php echo $_SESSION['idruta']; ?> </h5> 
                <h5>Usuario: <?php echo $_SESSION['IDuser']; ?> </h5>
            </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">

            <div class="user line-input">
                <input type="text" placeholder="Nombre del titular" name="NombreT">
            </div>
            
            <div>
                <input type="number" min="0"  placeholder="Numero de la tarjeta" name="NumeroT">
            </div>
            <div>
                <input type="number" min="0" placeholder="Fecha vencimiento" name="FechaT">
            </div>
            <div>
                <input type="number" min="0" placeholder="Codigo CVV" name="Codigocvv">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="text-center">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <div class="text-center">
                <input type="submit" value="Comprar">
            </div>  
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>