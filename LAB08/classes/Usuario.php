<?php
class Usuario {
    // Dos propiedades públicas
    public $nombre;
    public $email;
    
    // Constructor 
    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    // Segundo método
    public function obtenerInformacion() {
        return "Usuario: " . $this->nombre . ", Email: " . $this->email;
    }
    
    public function imprimirDatos() {
        echo "<div class='info-usuario'>";
        echo "<p><strong>Nombre:</strong> " . $this->nombre . "</p>";
        echo "<p><strong>Email:</strong> " . $this->email . "</p>";
        echo "</div>";
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>