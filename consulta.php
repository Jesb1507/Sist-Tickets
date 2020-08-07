<?php
    function lista_idrutas(){		
        include('database.php');
        $time = date("H:i:s");
        $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
        return $result=$mysqli->query($sql); 
    }

?>

