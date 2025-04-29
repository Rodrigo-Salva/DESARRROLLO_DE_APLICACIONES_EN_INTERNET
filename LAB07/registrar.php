<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// Iniciamos la sesión
session_start();

// Obtenemos los datos del registro
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Creamos un nuevo usuario
$user = new Usuario($nombre, $correo, $clave);

// Obtenemos la lista de usuario registrados
$lista = new Lista();
$lista->setUsuarios($_SESSION['lista']);

// Agregamos el nuevo usuario
$lista->agregar($user);

// Guardamos la lista de usuarios
$_SESSION['lista'] = $lista->getUsuarios();

header('Location: index.php');
?>