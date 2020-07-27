
<?php
	function lista_idrutas(){		
		include('database.php');	
		$sql="SELECT * FROM rutas";
		return $result=$mysqli->query($sql); 
	}

	function lista_ruta(){		
		include('database.php');	
		$sql="SELECT * FROM clientes";
		return $result=$mysqli->query($sql); 
	}

	function lista_fecha(){		
		include('database.php');	
		$sql="SELECT * FROM tipo_mantenimiento";
		return $result=$mysqli->query($sql); 
	}

	function lista_hora(){		
		include('database.php');	
		$sql="SELECT * FROM tripulacion";
		return $result=$mysqli->query($sql); 
	}

?>