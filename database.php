
<?php
    $mysqli = new mysqli("localhost", "root", "", "gtdatabase");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MYSQL:";
    }
    date_default_timezone_set('America/Santo_Domingo');
?>