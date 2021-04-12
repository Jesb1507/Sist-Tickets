<?php

     try{
        $conexion = new PDO('mysql:host=localhost;dbname=gtdatabase', 'root', '');
        }catch(PDOException $message_error){
            echo "Error: " . $prueba_error->getMessage();
        }
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: estados_viajes.php');
            break;

            case 2:
            header('location: home.php');
            break;

            default:
        }
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('sha512', $password);
        
        $error = '';            
        $error2='';
        if (empty($email) or empty($password)){
          $error .= '<i>Favor de rellenar todos los campos</i>';
        }

        if($error==''){
          
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('sha512', $password);
          
        $query = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password');
        $query->execute(['email' => $email, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);

        $Nuser='';
        
        if($row == true){
            
            $rol = $row[6];
            $Nuser = $row[1];
            $IDuser = $row[0];

            
            $_SESSION['IDuser'] = $IDuser;
            $_SESSION['Nuser'] = $Nuser;
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                  header('location: estados_viajes.php');
                break;

                case 2:
                  header('location: home.php');
                break;

                default:
            }
          }else{
            $error2='<i>La contraseña o el correo son incorrectos</i>';
        }

        }
      }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
	  <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="alertifyjs/alertify.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand"style="color:rgb(47, 224, 186)"  href="./index.php">La Camionta Express</a>      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" style="color:rgb(47, 224, 186)" href="./inicio.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"style="color:rgb(47, 224, 186)"  href="./horariosX.php">Horarios</a>
        </li>
      </ul>
    <div class="px-2">
      <a class="btn"style="color:rgb(47, 224, 186)"  role="button" href="inicio.php">Inicio</a>
    </div>
    <div class="px-2">
      <a class="btn" style="color:rgb(47, 224, 186)" role="button" href="signup.php">Registrarse</a>
    </div>
  </nav>    
  </div>
  </div>
</div>
</header>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div class= "containerlog">
      <div class="header">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form" id="formlog">
            <div class="text-center">
                <h3>Iniciar Sesion</h3>
                  <input type="text"  style="border-bottom:5px solid #008080;"  placeholder="Correo" name="email" id="email">
              <div class="password line-input">
                  <input type="password"  style="border-bottom:5px solid #008080;"  placeholder="Contraseña" name="password" id="password">
              </div>
    
              

              <div class="text-center">
                <input type="submit" style="border:2px solid #008080;" class="botonlg" value="Entrar">
              </div>
            </div>
          </form>

          <?php if(!empty($error2)): ?> 
              <script>
                alertify.alert('La CamiontaExpress', 'La contraseña o el correo son incorrectos', function(){ alertify.success('Ok'); });
              </script>
            <?php endif; ?>      

            <?php if(!empty($error)): ?>  
              <script>
                alertify.alert('La CamiontaExpress', 'Por Favor Rellenar Todos los Campos', function(){ alertify.success('Ok'); });
              </script>
            <?php endif; ?>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>