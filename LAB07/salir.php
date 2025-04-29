<?php
// Iniciamos la sesión
// En este caso se toma la sesión existente
session_start();

// Se elimina la sesión existente
session_destroy();

// Redirección a la página principal
header('Location: index.php');
?>
