<?php
// Incluir manejo de sesiones
require_once 'includes/session.php';

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Mensaje de confirmación
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sesión cerrada</title>
    <link rel='stylesheet' href='assets/css/style.css'>
</head>
<body>
    <div class='container'>
        <h2>Sesión cerrada</h2>
        <div class='mensaje'>Sesión cerrada correctamente.</div>
        <p><a href='index.php'>Volver al inicio</a></p>
    </div>
</body>
</html>";
?>