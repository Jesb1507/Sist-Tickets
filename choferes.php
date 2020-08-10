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


if ($i == 'DLT') {    
    $sql="
    UPDATE `conductores` SET
    `estado` = 'I'
    WHERE `idconductor` = '$codigo'";

    if ($mysqli->query($sql)) {
        $msj ='successdlt';
    } else {
        $msj ='errordlt';
    }

    header("Location:./estado_choferes.php?s=".$msj);
}
if ($i == 'HBL') {    
    $sql="
    UPDATE `conductores` SET
    `estado` = 'A'
    WHERE `idconductor` = '$codigo'";

    if ($mysqli->query($sql)) {
        $msj ='successhbl';
    } else {
        $msj ='errorhbl';
    }

    header("Location:./estado_choferes.php?s=".$msj);
    
}



?>