<?php

global $pdo;
require_once __DIR__ . '/../config/database.php';
function conectarBD() {
    try {
        $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e    ) {
        echo "<div class='error'>Error de conexión: " . $e->getMessage() . "</div>";
        return null;
    }
}

function obtenerUsuarios() {
    $conexion = conectarBD();
    if ($conexion) {
        try {
            $consulta = $conexion->prepare("SELECT nombre, email FROM usuarios");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<div class='error'>Error en la consulta: " . $e->getMessage() . "</div>";
            return [];
        }
    }
    return [];
}

function mostrarUsuarios() {
    $usuarios = obtenerUsuarios();
    if (!empty($usuarios)) {
        echo "<ul class='usuarios-lista'>";
        foreach ($usuarios as $user) {
            echo "<li>" . $user['nombre'] . " (" . $user['email'] . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay usuarios registrados o no se pudo conectar a la base de datos.</p>";
        
        echo "<h3>Usuarios de ejemplo:</h3>";
        echo "<ul class='usuarios-lista'>";
        echo "<li>Juan Pérez (juan@ejemplo.com)</li>";
        echo "<li>María López (maria@ejemplo.com)</li>";
        echo "<li>Carlos Rodríguez (carlos@ejemplo.com)</li>";
        echo "</ul>";
    }
}
function guardarUsuario($nombre, $email, $password) {
    try {
        $conexion = conectarBD();
        if ($conexion) {
            // Verificar si el email ya existe
            $checkSql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
            $checkStmt = $conexion->prepare($checkSql);
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();
            
            if ($checkStmt->fetchColumn() > 0) {
                echo "<div class='warning'>El email '$email' ya está registrado en el sistema.</div>";
                return false;
            }
            
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $passwordHash);
            
            $result = $stmt->execute();
            if ($result) {
                echo "<div class='success'>Usuario registrado correctamente.</div>";
            }
            return $result;
        }
    } catch (PDOException $e) {
        echo "<div class='error'>Error al guardar el usuario: " . $e->getMessage() . "</div>";
    }
    return false;
}   
function obtenerUsuarioPorEmail($email) {
    try {
        $conexion = conectarBD();
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<div class='error'>Error al obtener el usuario: " . $e->getMessage() . "</div>";
        return false;
    }
}

?>

