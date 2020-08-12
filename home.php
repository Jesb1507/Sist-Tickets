<?php
  include('./header.php');
    try{
      $mysqli = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
    }catch(PDOException $message_error){
      echo "Error: " . $prueba_error->getMessage();
    }
    
    $user = $_SESSION['IDuser'];
    $query = $mysqli->prepare('SELECT * FROM usuarios WHERE iduser = :iduser ');
    $query->execute(['iduser' => $user]);
    $row = $query->fetch(PDO::FETCH_NUM);
    $puntos = $row[5];
    
    
    if(!isset($_SESSION['rol'])){
        header('location: logreq.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: logreq.php');
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camionta Express</title>
</head>
<body background="bg2.png">
<div class="d-flex flex-row mb-5">
  <div class="container p-3">
    <div class="header2" style="background-color:#09bcf3;">
      <h3>LA CAMIONTA EXPRESS</h3><br>
      <h5>Usuario: <?php echo $_SESSION['Nuser']; ?> </h5><br>
      <h5>UsuarioID: <?php echo $_SESSION['IDuser']; ?> </h5><br>
      <h5>Puntos: <?php echo $puntos; ?> </h5><br>
      <h5>Tickets Comprados:</h5>
      <h5>
      <?php 
        $query = UsuarioT($user);
        while ($row = $query->fetch_assoc()) {
            echo"
                <tr>
                    <td>ticketID: ".$row['idfactura']."</td>
                    <td>rutaID: ".$row['idruta']."</td>
                </tr>

            ";
        }
      ?> </h5><br>
    </div>
    <div class="container pt-3 header2" style="background-color:#e9e62c;">
      <h3>CamiontaPoints</h3><br>
      <h5>100 Puntos = 5% descuento.</h5><br>
      <h5>200 Puntos = 10% descuento.</h5><br>
      <h5>300 Puntos = 15% descuento.</h5><br>
      <h5>400 Puntos = 25% descuento.</h5><br>
      <h5>500 Puntos = 35% descuento.</h5><br>
      <h5>600 Puntos = 55% descuento.</h5><br>
      <h5>700 Puntos = 65% descuento.</h5><br>
      <h5>800 Puntos = 75% descuento.</h5><br>     
      <h5>1000 Puntos = 100% descuento.</h5><br>
    </div>
  </div>
  <div class="p-3">
    <div class="ml-auto p-2 bd-highlight">
      <div class="d-flex bd-highlight" style="background-color:white;">
        <div class="p-2 flex-fill bd-highlight"><img src="./Images/caribe_tours.jpg" class="img-fluid p-2" alt=""></div>
        <div class="p-4 flex-fill bd-highlight"><p>Caribe Tours es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones caribe tours podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
      </div>
    </div>
    <div class="container p-3">
      <div class="d-flex bd-highlight" style="background-color:white;">
        <div class="p-4 flex-fill bd-highlight"><p>Expreso Vegano es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones expreso vegano podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
        <div class="p-2 flex-fill bd-highlight"><img src="./Images/expreso_vegano.jpg" class="img-fluid p-2" alt="" width="1080" height="720"></div>
      </div>
    </div>
    <div class="container p-3">
      <div class="d-flex bd-highlight" style="background-color:white;">
        <div class="p-2 flex-fill bd-highlight"><img src="./Images/quinto_patio.jpg" class="img-fluid p-2" alt="" width="1080" height="720"></div>
        <div class="p-4 flex-fill bd-highlight"><p>Quinto Patio es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones quinto patio podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
      </div>
    </div>
  </div>
</div>
<?php include('./footer.php')?>
</body>
</html>
