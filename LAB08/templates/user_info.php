<div class="container">
    <h2>Información de usuario</h2>
    <?php
    $usuario = new Usuario($_SESSION['usuario'], $_SESSION['email']);
    echo "<p>" . $usuario->obtenerInformacion() . "</p>";
    $usuario->imprimirDatos();
    
    
    $admin = new Administrador("Admin " . $_SESSION['usuario'], $_SESSION['email'], "Nivel 3");
    echo "<h3>Vista como administrador (ejemplo de herencia):</h3>";
    echo "<p>" . $admin->obtenerInformacion() . "</p>";
    echo "<p>" . $admin->verificarPermisos() . "</p>";
    $admin->imprimirDatos();
    ?>
</div>