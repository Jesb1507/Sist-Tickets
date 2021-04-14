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
    
    $iduser = $_SESSION['IDuser'];
    $idrutas= $_SESSION['idruta'];
    $precio=$_SESSION['precio'];

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
        $timet = date("Y/m/d H:i:s");
        $_SESSION['fecha']=$timet;
        $idruta=$_SESSION['idruta'];
        $IDuser=$_SESSION['IDuser'];
        $precio=$_SESSION['precio'];
        $fecha = date("Y-m-d H:i:s");
        $sql= "INSERT INTO `tickets`( `idfactura`,`idruta`,`iduser`,`fecha`,`precio`) VALUES (NULL, $idruta, $IDuser, '$timet', '$precio')";
        $result=$mysqli->query($sql);
        $Ucapidad = $mysqli->prepare("UPDATE `rutas` SET `capacidad`= :capacidadUp WHERE `idrutas`=:idrutas");
        $Ucapidad->execute(array('capacidadUp'=>$capacidadUp, ':idrutas'=>$idrutas));
        header('location: ticket.php');                 
    }

    
?>
