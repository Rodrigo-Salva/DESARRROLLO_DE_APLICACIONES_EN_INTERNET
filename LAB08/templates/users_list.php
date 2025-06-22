<?php
// Iniciar sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

// Verificar si el usuario es administradoR
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    echo "<div class='error'>Acceso denegado. Solo administradores.</div>";
    exit;
}

// Incluir archivo que tiene la función mostrarUsuarios
require_once __DIR__ . '/../db/usuarios.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios Registrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .usuarios-lista {
            list-style-type: none;
            padding: 0;
        }
        .usuarios-lista li {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Usuarios registrados en el sistema</h2>
    <?php mostrarUsuarios(); ?>
</div>

</body>
</html>
