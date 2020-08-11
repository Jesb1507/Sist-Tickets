<?php
    include('headeradm.php');

?>

<!-- Inicio de Panel de Detalles -->
<div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1>Reporte de Tickets</h1>
        <p>
            <a data-toggle='tooltip' title='Imprimir' href='./Reporte_Tickets.php' > <img src='img/print.png' width=50px/> </a>
        </p>
        
    </div>
    <div class="panel-body">
        <br>
        <hr>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Id Factura</th>
                    <th>Id Ruta</th>
                    <th>Id User</th>
                    <th>Fecha de emision</th>
                    <th>Precio</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $query = reporteTickets();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idfactura']."</td>
                                <td>".$row['idruta']."</td>
                                <td>".$row['iduser']."</td>
                                <td>".$row['fecha']."</td>
                                <td>".$row['precio']."</td>
                               
                        ";
                        
                    }
                ?>


            </tbody>

        </table>

    </div>
</div> 