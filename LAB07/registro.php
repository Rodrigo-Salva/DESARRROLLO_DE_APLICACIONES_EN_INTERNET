<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// Iniciamos la sesión
session_start();

// Obtenemos la lista de usuarios
if (isset($_SESSION['lista'])) {
    $lista = $_SESSION['lista'];
} else {
    $lista = array(); // Lista vacía si no hay usuarios registrados
    $_SESSION['lista'] = $lista;
}

// Procesamos el formulario de registro
$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Validar si el correo ya está registrado
    $correoExistente = false;
    foreach ($lista as $usuario) {
        if ($usuario->getCorreo() === $correo) {
            $correoExistente = true;
            break;
        }
    }

    if ($correoExistente) {
        $error = "El correo ya está registrado. Intente con otro.";
    } else {
        // Crear un nuevo usuario y agregarlo a la lista
        $nuevoUsuario = new Usuario($nombre, $correo, $clave);
        $lista[] = $nuevoUsuario;
        $_SESSION['lista'] = $lista; // Actualizar la lista en la sesión
        $success = "Usuario registrado exitosamente. ¡Ahora puede iniciar sesión!";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-4">
        <form method="post" action="registro.php" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Registro</h2>
            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $error ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= $success ?></div>
            <?php endif; ?>
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="mb-4">
                <label for="correo" class="block text-gray-700 font-medium">E-mail</label>
                <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="mb-4">
                <label for="clave" class="block text-gray-700 font-medium">Contraseña</label>
                <input type="password" id="clave" name="clave" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="text-right mb-4">
                <a href="login.php" class="text-blue-500 hover:underline">¿Ya tiene una cuenta? Inicie sesión aquí</a>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Registrar</button>
        </form>
    </div>
</body>

</html>