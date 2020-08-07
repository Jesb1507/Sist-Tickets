<?php
include('database.php');
// INS | UDT | DLT

$i = '';
if (isset($_GET['accion'])) {
    $i = $_GET['accion'];
}

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
}

if (isset($_GET['idC'])) {
    session_start();
    $compra = $_GET['idC'];
    $_SESSION['idruta'] = $compra;
    header("Location:./compra.php");
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
        $msj ='successdlt';
    } else {
        $msj ='errordlt';
    }

    header("Location:./estados_viajes.php?s=".$msj);
}


if($i=='HBL'){
    $sql="
    UPDATE `rutas` SET
    `estado` = 'A'";

    if($mysqli->query($sql)){
        $msj='successhbl';
    } else{
        $msj='errorhbl';
    }
    header("Location:./estados_viajes.php?s=".$msj);
}
?>