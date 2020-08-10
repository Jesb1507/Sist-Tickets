<?php
    include('headeradm.php');
    include('choferes.php');
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
                $mensaje = 'Registro inabilitado correctamente';
                $color = 'success';
                break;
            
            case 'errordlt':
                $mensaje = 'Imposible inhabilitar el registro';
                $color = 'danger';
                break;
        }
    }

    if (isset($_GET['s'])){
        switch ($_GET['s']) {
            case 'successhbl':
                $mensaje = 'Conductor habilitado correctamente';
                $color = 'success';
                break;
            
            case 'errorhbl':
                $mensaje = 'Imposible habilitar el registro';
                $color = 'danger';
                break;
        }
    }

    if (!empty($mensaje) and !empty($color)) {
        //echo'<div class="alert alert-'.$color.'" role="alert">'.$mensaje .'</div> ';
        echo'<div class="alert alert-'.$color.'" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span>'.$mensaje.'</span>
        </div>';
    }
    
    function lista_estachoferes(){		
        include('database.php');	
        $sql="SELECT * FROM `conductores`";
        return $result=$mysqli->query($sql); 
    }
?>

<!-- Inicio de Panel de Detalles -->
<div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1>Listado de Conductores</h1>
    </div>
    <div class="panel-body">
        <br>
        <hr>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Id Conductor</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Licencia de Conducir</th>
                    <th>Sueldo</th>
                    <th>Seguro</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = lista_estachoferes();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idconductor']."</td>
                                <td>".$row['nombre']."</td>
                                <td>".$row['apellido']."</td>
                                <td>".$row['cedula']."</td>
                                <td>".$row['pconducir']."</td>
                                <td>".$row['sueldo']."</td>
                                <td>".$row['seguro']."</td>
                                <td>".$row['estado']."</td>
                                <td> <a data-toggle='tooltip' title='Habilitar' href='choferes.php?accion=HBL&id=".$row['idconductor']."' class='btn btn-primary'> <img src='img/check.png' width=34px /> </a> </td>
                                <td> <a data-toggle='tooltip' title='Anular' href='choferes.php?accion=DLT&id=".$row['idconductor']."' class='btn btn-danger'> <img src='img/basura.png' width=34px /> </a></td>
                        ";
                        
                    }
                ?>


            </tbody>

        </table>

    </div>
</div> <!-- Fin del Panel -->
