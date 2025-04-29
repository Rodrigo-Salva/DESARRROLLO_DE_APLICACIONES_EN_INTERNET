<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// Iniciamos la sesión
session_start();

// Definir credenciales del administrador
$adminCorreo = "admin@gmail.com";
$adminClave = "admin123";

// Obtenemos la lista de usuarios
if (isset($_SESSION['lista'])) {
    $lista = $_SESSION['lista'];
} else {
    $lista = array(); // Lista vacía si no hay usuarios registrados
    $_SESSION['lista'] = $lista; // Guardamos la lista vacía en la sesión
}

// Procesamos el formulario de login
$error = null;
$usuarioAutenticado = null; // Inicializar antes del bucle

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Validamos si es el administrador
    if ($correo === $adminCorreo && $clave === $adminClave) {
        $usuarioAutenticado = "admin"; // Identificar al administrador
    } else {
        // Validamos las credenciales de los usuarios registrados
        foreach ($lista as $usuario) {
            if ($usuario->getCorreo() === $correo && $usuario->getClave() === $clave) {
                $_SESSION['usuario'] = $usuario;
                $usuarioAutenticado = $usuario;
                break;
            }
        }
    }

    if (!$usuarioAutenticado) {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 7</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-4">
        <?php if ($usuarioAutenticado === "admin"): ?>
            <!-- Mostrar la lista de usuarios si el administrador inicia sesión -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-center text-3xl font-bold text-gray-800 mb-6">Usuarios Registrados</h1>
                <table class="table-auto w-full bg-gray-100 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-300 text-gray-700">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $index => $usuario): ?>
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2 text-center"><?= $index + 1 ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($usuario->getNombre()) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($usuario->getCorreo()) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right mt-5">
                    <a href="salir.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cerrar Sesión</a>
                </div>
            </div>
        <?php elseif ($usuarioAutenticado): ?>
            <!-- Mostrar mensaje de bienvenida si un usuario normal inicia sesión -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenido, <?= htmlspecialchars($usuarioAutenticado->getNombre()) ?></h1>
                <div class="mt-5">
                    <a href="salir.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cerrar Sesión</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Mostrar el formulario de login si no está autenticado -->
            <form method="post" action="login.php" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Ingreso</h2>
                <?php if ($error): ?>
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $error ?></div>
                <?php endif; ?>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 font-medium">E-mail</label>
                    <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="clave" class="block text-gray-700 font-medium">Contraseña</label>
                    <input type="password" id="clave" name="clave" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="text-right mb-4">
                    <a href="registro.php" class="text-blue-500 hover:underline">¿No tiene usuario? Regístrese aquí</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Ingresar</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>