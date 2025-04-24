<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';

$id = $_GET['id'];

$bd = BaseMySql::conexion();
$peliculasDB = new MovieDB();
$peliculasDB->eliminar($bd, $id);

header("Location: index.php");
exit();
?>
