<?php
    include('./header.php');
    if(!isset($_SESSION['rol'])){
        header('location: logreq.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: logreq.php');
        }
    }
?>


<div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1>Horarios</h1>
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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = lista_idrutas();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idrutas']."</td>
                                <td>".$row['ruta']."</td>
                                <td>".$row['hora']."</td>
                                <td> <a data-toggle='tooltip' title='Comprar' href='ruta.php?idC=".$row['idrutas']."' class='btn btn-primary'> <img src='img/compra.png' width=26px /> </a> </td>
                            </tr>

                        ";
                    }
                ?>


            </tbody>

        </table>

    </div>
</div> <!-- Fin del Panel -->