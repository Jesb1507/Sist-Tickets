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
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <p>
                <input type="text" name="lruta" id="lruta" list="listruta">
                <input type="submit" class='btn' value="Filtrar">
            </p>
        </form>
        <datalist id="listruta">
            <option value="La Vega-Santiago de los caballeros">
            <option value="La Vega-Salcedo">
            <option value="La Vega-San Pedro de Macoris">
        </datalist>
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
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = lista_idrutasU();
                    while ($row = $query->fetch_assoc()) {
                        echo"
                            <tr>
                                <td>".$row['idrutas']."</td>
                                <td>".$row['ruta']."</td>
                                <td>".$row['hora']."</td>
                                <td>".$row['precio']."</td>
                                <td> <a data-toggle='tooltip' title='Comprar' href='ruta.php?idP=".$row['precio']."&idC=".$row['idrutas']."&rta=".$row['ruta']."&hrs=".$row['hora']."' class='btn btn-primary'> <img src='img/compra.png' width=26px /></a> </td>
                            </tr>

                        ";
                    }
                ?>


            </tbody>

        </table>

    </div>
</div> <!-- Fin del Panel -->