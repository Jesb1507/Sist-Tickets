<?php
    function lista_idrutas(){		
        include('database.php');
        $time = date("H:i:s");
        $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
        return $result=$mysqli->query($sql); 
    }
	
    function lista_idrutasX(){		
        include('database.php');
        $time = date("H:i:s");
        $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
        return $result=$mysqli->query($sql); 
    }

	// function lista_fecha(){		
	// 	include('database.php');	
	// 	$sql="SELECT * FROM rutas";
	// 	return $result=$mysqli->query($sql); 
	// }

	// function lista_hora(){		
	// 	include('database.php');	
	// 	$sql="SELECT * FROM rutas";
	// 	return $result=$mysqli->query($sql); 
	// }

?>