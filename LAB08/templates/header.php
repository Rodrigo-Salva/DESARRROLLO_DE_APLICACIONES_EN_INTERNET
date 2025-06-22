<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Usuarios</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Usuarios</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <?php if (estaAutenticado()): ?>
                    <li><a href="?logout=1">Cerrar sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
