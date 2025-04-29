<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// Iniciamos la sesión
session_start();

/**
 * Verificamos si existe un usuario logueado.
 * Para ello se verifica si existe una variable de sesión 
 * que contenga al usuario.
 */
if (!isset($_SESSION['usuario'])) {
    // Si no existe, se redirige a inicio
    header('Location: login.php');
}

// Obtenemos el usuario logueado
$usuario = $_SESSION['usuario'];

// Verificamos si existe la lista de usuarios
if (!isset($_SESSION['lista'])) {
    $lista = new Lista();
    $_SESSION['lista'] = $lista->nueva();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-info">
                <div class="card-title text-center fs-1 text-white">Bienvenido</div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <div class="card-text"><?php echo $usuario->getNombre() ?></div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <div class="card-text"><?php echo $usuario->getCorreo() ?></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <a href="salir.php" class="btn btn-danger btn-lg">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>