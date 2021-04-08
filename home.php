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
<body>
<div class="d-flex flex-row mb-5">
  <div class="container p-3">
    <div class="header2" style="background-color:#34495E;">
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
        <td>Ticket: ".$row['idfactura']."</td>
        <td> Ruta: ".$row['idruta']."</td><br>
        </tr>";
      }
      ?> </h5><br>
    </div>
    <div class="container pt-3 header2" style="background-color:#34495E;">
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
  <script>
    function maxcap(){
      alertify.alert('La CamiontaExpress', 'Ya se ha alcanzado el maximo de cupos en este viaje.', function(){ alertify.success('Ok'); });
    }
  </script>
</div>
<?php include('./footer.php')?>
</body>
</html>
