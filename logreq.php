<?php
    require 'database.php'

    $usuarios = $mysqli->query("SELECT email, nombre
    FROM usuarios
    WHERE Email = '".$_POST['email']."'
    AND Password = '".$_POST['passw']."'");

    if($usuarios->num_rows==1):
        $datos = $usuarios->fetch_assoc();
        echo json_encode(array('error'=>false, 'tipo'=>$datos['nombre']))
    else:
        echo json_encode(array('error'=>true));
    endif;

    $mysqli->close();
?>