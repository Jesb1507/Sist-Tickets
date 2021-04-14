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
      ?> </h5>
    </div>
    <br>

  <div class="card mb-3" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4">
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.288275501356!2d-70.53268318468561!3d19.226264252227107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb02debbccd3155%3A0x170721bc04d93cbe!2sExpreso%20Quinto%20Patio!5e0!3m2!1sen!2sdo!4v1618426555553!5m2!1sen!2sdo" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <img src="./Images/qp.jpeg" width="370" height="300" style="border:0;">
        <h5 class="card-title">Quinto Patio La Vega</h5>
        
      </div>
    </div>
  </div>
  </div>

   
  <div class="card mb-3" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4">
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3762.0846539490185!2d-70.70035388468338!3d19.451916645102266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8eb1cf5eafb85f07%3A0x334b7384edf666dc!2sExpreso%205to.%20Patio%2C%20Santiago%20De%20Los%20Caballeros%2051000!3m2!1d19.4519116!2d-70.69816519999999!5e0!3m2!1sen!2sdo!4v1618423077385!5m2!1sen!2sdo" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <img src="./Images/qps.jpg" width="370" height="300" style="border:0;">
        <h5 class="card-title">Quinto Patio Santiago</h5>
        <br>
        <br>
      </div>
    </div>
  </div>
  </div>
  <div class="card mb-3" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4">
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d120502.8394005494!2d-70.5422132393716!3d19.294811357552856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e3!4m0!4m5!1s0x8eae29d2b5a154b7%3A0xd639be27b07d1a61!2sParada%20de%20Autobuses%20Salcedo%20-%20Santiago%2C%2034000!3m2!1d19.3804859!2d-70.42075969999999!5e0!3m2!1sen!2sdo!4v1618426333086!5m2!1sen!2sdo" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <img src="./Images/ps.jpg" width="370" height="300" style="border:0;">
        <h5 class="card-title">Parada Salcedo</h5>
        <br>
        <br>
      </div>
    </div>
  </div>
  </div>
  <div class="card mb-3" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4">
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3767.3138060812075!2d-70.52325388468545!3d19.225150852262168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8eb02b638cfad473%3A0xd90afaafd7e065cb!2sExpreso%20UCHOMVESA%20(La%20Vega%20-%20Santiago)%2C%20La%20Vega%2041000!3m2!1d19.2251458!2d-70.5210652!5e0!3m2!1sen!2sdo!4v1618422673565!5m2!1sen!2sdo" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <img src="./Images/ev.jpg" width="370" height="300" style="border:0;">
        <h5 class="card-title">Uchomvesa</h5>

      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</div>
<br>
<br>  
    </div>
  </div>
  

 </div>  
  <script>
    function maxcap(){
      alertify.alert('La CamiontaExpress', 'Ya se ha alcanzado el maximo de cupos en este viaje.', function(){ alertify.success('Ok'); });
    }
  </script>

<?php include('./footer.php')?>
</body>
</html>
