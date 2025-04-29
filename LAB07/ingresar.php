<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

session_start();

// Obtenemos la lista de usuarios
$lista = isset($_SESSION['lista']) ? $_SESSION['lista'] : new Lista();

// Obtenemos los datos del formulario
$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Validamos el usuario
$usuarioValido = null;
foreach ($lista as $usuario) {
    if ($usuario->getCorreo() === $correo && $usuario->getClave() === $clave) {
        $usuarioValido = $usuario;
        break;
    }
}

if ($usuarioValido) {
    $_SESSION['usuario'] = $usuarioValido;
    header('Location: usuarios.php'); // Redirige a la página de usuarios
    exit();
} else {
    echo "Correo o contraseña incorrectos.";
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
            <div class="card-header">
                <div class="card-title text-center fs-1">Ingreso</div>
            </div>
            <div class="card-body">
                <div class="mb-3 fs-2 text-center">
                    No se encontró al usuario
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <a href="index.php" class="btn btn-danger btn-lg">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>