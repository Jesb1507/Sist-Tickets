<?php
    include('headeradm.php');
    include('ruta.php');
    $mensaje = '';
    $color = '';

    if(!isset($_SESSION['rol'])){
        header('location: logreq.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: logreq.php');
        }
    }

    if (isset($_GET['s'])){
        switch ($_GET['s']) {
            case 'successdlt':
                $mensaje1 = 'Ruta inhabilitada correctamente';
                break;
            
            case 'errordlt':
                $mensaje2 = 'Imposible inhabilitar la ruta';
                break;
        }
    }

    if (isset($_GET['s'])){
        switch ($_GET['s']) {
            case 'successhbl':
                $mensaje3 = 'Ruta habilitada correctamente';
                $color = 'success';
                break;
            
            case 'errorhbl':
                $mensaje4 = 'Imposible habilitar la ruta';
                $color = 'danger';
                break;
        }
    }

    // if (!empty($mensaje) and !empty($color)) {
    //     //echo'<div class="alert alert-'.$color.'" role="alert">'.$mensaje .'</div> ';
    //     echo'<div class="alert alert-'.$color.'" role="alert">
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>
    //     <span>'.$mensaje.'</span>
    //     </div>';
    // }
    
    function lista_estadorutas(){		
        include('database.php');	
        $sql="SELECT * FROM `rutas`";
        return $result=$mysqli->query($sql); 
    }
?>

<!-- Inicio de Panel de Detalles -->
<div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1>Listado de Rutas</h1>
        
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
	    <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">    
        <script src="alertifyjs/alertify.js"></script>
    </div>
    <div class="panel-body">
        <br>
        <hr>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Id Ruta</th>
                    <th>Ruta</th>
                    <th>Hora</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Habilitar</th>
                    <th>Inhablitar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = lista_estadorutas();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idrutas']."</td>
                                <td>".$row['ruta']."</td>
                                <td>".$row['hora']."</td>
                                <td>".$row['capacidad']."</td>
                                <td>".$row['estado']."</td>
                                <td>".$row['precio']."</td>
                                <td> <a data-toggle='tooltip' title='Habilitar' href='ruta.php?accion=HBL&id=".$row['idrutas']."' class='btn btn-primary'> <img src='img/check.png' width=34px /> </a> </td>
                                <td> <a data-toggle='tooltip' title='Anular' href='ruta.php?accion=DLT&id=".$row['idrutas']."' class='btn btn-danger'> <img src='img/cancel.png' width=34px /> </a></td>
                        ";
                        
                    }
                ?>


            </tbody>

        </table>
        <?php if(!empty($mensaje1)): ?> 
            <script>
                alertify.alert('La CamiontaExpress', 'Ruta inhabilitada correctamente', function(){ alertify.success('Ok'); });
            </script>
        <?php endif; ?>      
        <?php if(!empty($mensaje2)): ?> 
            <script>
                alertify.alert('La CamiontaExpress', 'Imposible inhabilitar la ruta', function(){ alertify.success('Ok'); });
            </script>
        <?php endif; ?>    

        <?php if(!empty($mensaje3)): ?> 
            <script>
                alertify.alert('La CamiontaExpress', 'Ruta habilitada correctamente', function(){ alertify.success('Ok'); });
            </script>
        <?php endif; ?> 

        <?php if(!empty($mensaje4)): ?> 
            <script>
                alertify.alert('La CamiontaExpress', 'Imposible habilitar la ruta', function(){ alertify.success('Ok'); });
            </script>
        <?php endif; ?> 
    </div>
</div> <!-- Fin del Panel -->
