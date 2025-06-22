<?php
require_once 'Usuario.php';

class Administrador extends Usuario {
    public $nivel;
    
    public function __construct($nombre, $email, $nivel) {
        // Llamando al constructor de la clase padre
        parent::__construct($nombre, $email);
        $this->nivel = $nivel;
    }
    
    
    public function verificarPermisos() {
        return "El administrador " . $this->nombre . " tiene nivel de acceso: " . $this->nivel;
    }
    
    public function obtenerInformacion() {
        return "Administrador: " . $this->nombre . ", Email: " . $this->email . ", Nivel: " . $this->nivel;
    }
    
    public function imprimirDatos() {
        // Llamamos al método de la clase padre para reutilizar código
        parent::imprimirDatos();
        echo "<div class='info-admin'>";
        echo "<p><strong>Nivel de acceso:</strong> " . $this->nivel . "</p>";
        echo "</div>";
    }
}
?>