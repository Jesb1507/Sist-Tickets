<?php
	function lista_idrutas(){	
		include('database.php');
		date_default_timezone_set('America/Santo_Domingo');
		$hora= date("H:i:s");
		$sql="SELECT `idrutas`, `ruta`, `hora`, `estado` FROM `rutas` WHERE `hora` >= '$hora+10'";
		return $result=$mysqli->query($sql); 
	}

	// function lista_ruta(){		
	// 	include('database.php');	
	// 	$sql="SELECT * FROM rutas";
	// 	return $result=$mysqli->query($sql); 
	// }

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

