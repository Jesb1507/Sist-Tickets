<?php
include('database.php');


$i = '';
if (isset($_GET['accion'])) {
    $i = $_GET['accion'];
}

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
}


if ($i == 'DLT') {    
    $sql="
    UPDATE `rutas` SET
    `estado` = 'I'
    WHERE `idrutas` = '$codigo'";

    if ($mysqli->query($sql)) {
        $msj ='successdlt';
    } else {
        $msj ='errordlt';
    }

    header("Location:./estados_viajes.php?s=".$msj);
}

if ($i == 'HBL') {    
    $sql="
    UPDATE `rutas` SET
    `estado` = 'A'
    WHERE `idrutas` = '$codigo'";

    if ($mysqli->query($sql)) {
        $msj ='successhbl';
    } else {
        $msj ='errorhbl';
    }

    header("Location:./estados_viajes.php?s=".$msj);
}



if (isset($_GET['idC'])) {
    session_start();
    $compra = $_GET['idC'];
    $_SESSION['idruta']= $compra;
    header("Location:./compra.php");
}
if (isset($_GET['idP'])) {
    session_start();
    $precio = $_GET['idP'];
    $_SESSION['precio'] = $precio;
    header("Location:./compra.php");
}
if (isset($_GET['rta'])) {
    session_start();
    $ruta = $_GET['rta'];
    $_SESSION['ruta'] = $ruta;
    header("Location:./compra.php");
}

if (isset($_GET['hrs'])) {
    session_start();
    $hora= $_GET['hrs'];
    $_SESSION['hora'] = $hora;
    header("Location:./compra.php");
}

?>

