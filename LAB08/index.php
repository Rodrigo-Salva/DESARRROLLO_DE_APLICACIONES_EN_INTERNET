<?php
// Incluir archivos necesarios
require_once 'config/database.php';
require_once 'classes/Usuario.php';
require_once 'classes/Administrador.php';
require_once 'includes/session.php';
require_once 'includes/functions.php';
require_once 'db/usuarios.php';

// Procesar cierre de sesión si se solicita
cerrarSesion();

// Procesar inicio de sesión si hay datos de formulario
procesarInicioSesion();

// Procesar registro de usuario si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['email'], $_POST['password'])) {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($nombre) && !empty($email) && !empty($password)) {
        if (guardarUsuario($nombre, $email, $password)) {
            // Establecer las variables de sesión
            $_SESSION['usuario'] = $nombre;
            $_SESSION['email'] = $email;
            $_SESSION['rol'] = 'user'; // Asigna un rol por defecto, como 'user'

            // Redirigir al usuario a la página principal o a otra página
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='error'>Error al registrar el usuario.</div>";
        }
    } else {
        echo "<div class='error'>Todos los campos son obligatorios.</div>";
    }
}

// Incluir cabecera
cargarPlantilla('header');

// Mostrar contenido según estado de autenticación
if (estaAutenticado()) {
    cargarPlantilla('user_info');
    cargarPlantilla('users_list');
} else {
    cargarPlantilla('login_form');
}

// Mostrar información sobre la aplicación
cargarPlantilla('about');

// Incluir pie de página
cargarPlantilla('footer');

// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
