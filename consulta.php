<?php
	function lista_idrutas(){		
		include('database.php');
		// $hora=new Date().toLocaleString();
		$sql="SELECT * FROM `rutas` WHERE `estado`= 'A'";
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