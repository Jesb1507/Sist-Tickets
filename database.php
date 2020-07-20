  
<?php

try {
  $conn = new PDO("mysql:host=localhost;dbname=root;", '', gtdatabase);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>