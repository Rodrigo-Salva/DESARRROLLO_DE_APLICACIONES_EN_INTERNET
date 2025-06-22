<?php
// 4. SESIONES EN PHP (4.5 puntos)
session_start();
require_once __DIR__ . '/../db/usuarios.php';
// Función para verificar si el usuario está autenticado
function estaAutenticado() {
    return isset($_SESSION['usuario']) && isset($_SESSION['email']);
}

// Función para manejar el inicio de sesión
function procesarInicioSesion() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Verificar las credenciales en la base de datos
        $usuario = obtenerUsuarioPorEmail($email);
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Guardar los datos en la sesión
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol']; // Asume que tienes un campo 'rol' en la tabla

            // Redirigir al usuario a la página principal
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='error'>Credenciales incorrectas. Inténtalo de nuevo.</div>";
        }
    }
}
// Función para cerrar sesión
function cerrarSesion() {
    if (isset($_GET['logout'])) {
        // Destruir todas las variables de sesión
        $_SESSION = array();
        
        // Destruir la sesión
        session_destroy();
        
        // Mostrar mensaje y redirigir
        echo "<div class='mensaje'>Sesión cerrada correctamente.</div>";
        header("Refresh: 2; URL=index.php");
        exit;
    }
}

function procesarRegistroUsuario() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (guardarUsuario($nombre, $email, $password)) {
            // Establecer las variables de sesión
            $_SESSION['usuario'] = $nombre;
            $_SESSION['email'] = $email;
            $_SESSION['rol'] = 'user'; // Asigna un rol por defecto, como 'user'

            // Redirigir al usuario a la página principal o a otra página
            header("Location: users_list.php");
            exit;
        } else {
            echo "<div class='error'>Error al registrar el usuario.</div>";
        }
    }
}
?>