<?php
    function lista_idrutas(){		
        include('database.php');
        $time = date("H:i:s");
        $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
        return $result=$mysqli->query($sql); 
    }

    function lista_idrutasU(){		

        if(isset($_POST['lruta'])){
            include('database.php'); 
            $time = date("H:i:s");
            $ruta = $_POST['lruta'];
            $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time' AND `ruta` = '$ruta'";
            return $result=$mysqli->query($sql);
            header('location: horarios.php');
        }else{
            include('database.php'); 
            $time = date("H:i:s");
            $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
            return $result=$mysqli->query($sql);
        }
    }

?>

