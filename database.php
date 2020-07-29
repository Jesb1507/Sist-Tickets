
<?php
    $mysqli = new mysqli("localhost", "root", "", "gtdatabase");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MYSQL:";
    }
?>