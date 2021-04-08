<?php    
    include('./database.php');
    $time = date("H:i:s");
    if ($time>='22:00:00') {
        $sql="UPDATE `rutas` SET `capacidad`= '0' WHERE `estado`= 'A'";
        return $result=$mysqli->query($sql);
    }
    
    function lista_idrutas(){		
        include('database.php');
        $time = date("H:i:s");
        $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time'";
        return $result=$mysqli->query($sql); 
    }
 
    
    function lista_idrutasU(){
        $max=25;		
        if(isset($_POST['lruta'])){
            include('database.php'); 
            $time = date("H:i:s");
            $ruta = $_POST['lruta'];
            if($ruta=="Todos"){
                $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time' AND `capacidad` < '$max'";
                return $result=$mysqli->query($sql);
                header('location: horarios.php');
            }else{
                $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time' AND `ruta` = '$ruta' AND `capacidad` < '$max'";
                return $result=$mysqli->query($sql);
                header('location: horarios.php');
            }
        }else{
            include('database.php'); 
            $time = date("H:i:s");
            $sql="SELECT * FROM `rutas` WHERE `estado`= 'A' AND `hora` >= '$time' AND `capacidad` < '$max'";
            return $result=$mysqli->query($sql);
            header('location: horarios.php');
        }
    }
    function lista_choferes(){
        include('./database.php');
        $sql="SELECT * FROM 'conductores'";
        return $result=$mysqli->query($sql);

    }

    function extraerConductor($id){		
		include('./database.php');	
		$sql="SELECT * FROM conductores WHERE idconductor = '$id' ";
		return $result=$mysqli->query($sql); 
    }

    function reporteTickets(){
        include('./database.php');	
        $time = date("Y/m/d 00:00:00");
		$sql="SELECT * FROM tickets WHERE fecha >= '$time'";
		return $result=$mysqli->query($sql); 
    }

    function UsuarioT($user){
        include('./database.php');
        $time = date("Y/m/d 00:00:00");
		$sql="SELECT * FROM tickets WHERE fecha >= '$time' AND iduser = '$user'";
		return $result=$mysqli->query($sql); 
    }

?>

