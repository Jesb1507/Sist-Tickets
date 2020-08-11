<?php
    include('./header.php');
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
<div class="container p-3">
  <div class="d-flex bd-highlight" style="background-color:white;">
    <div class="p-2 flex-fill bd-highlight"><img src="./Images/caribe_tours.jpg" class="img-fluid p-2" alt=""></div>
    <div class="p-2 flex-fill bd-highlight"><p>Caribe Tours es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones caribe tours podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
  </div>
</div>
<div class="container p-3">
  <div class="d-flex bd-highlight" style="background-color:white;">
    <div class="p-2 flex-fill bd-highlight"><p>Expreso Vegano es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones expreso vegano podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
    <div class="p-2 flex-fill bd-highlight"><img src="./Images/expreso_vegano.jpg" class="img-fluid p-2" alt="" width="1080" height="720"></div>
  </div>
</div>
<div class="container p-3">
  <div class="d-flex bd-highlight" style="background-color:white;">
    <div class="p-2 flex-fill bd-highlight"><img src="./Images/quinto_patio.jpg" class="img-fluid p-2" alt="" width="1080" height="720"></div>
    <div class="p-2 flex-fill bd-highlight"><p>Quinto Patio es uno de nuestros afiliados de excelencia, con los cuales compartimos sedes de transportes para ampliar nuestros servicios a lo largo de todo el pais, ya que gracias a nuestra afliciaciones quinto patio podemos llegar cada vez mas lejos en nuestra bella isla.</p></div>
  </div>
</div>
    
<?php include('./footer.php')?>
</body>
</html>
