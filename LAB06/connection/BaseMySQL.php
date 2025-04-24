<?php

class BaseMySql {
    // Método para establecer la conexión a la base de datos
    public static function conexion() {
        try {
            $dsn = 'mysql:host=localhost;dbname=movies_db;port=3306;charset=utf8mb4';
            $usuario = 'root';
            $password = '';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $bd = new PDO($dsn, $usuario, $password, $options);
            return $bd;
        } catch (PDOException $error) {
            echo '<h2>No fue posible conectarse a la base de datos...</h2>' . $error->getMessage();
            exit;
        }
    }

    // Método para cerrar la conexión a la base de datos
    public static function close($bd) {
        $bd = null;
    }
}

?>  
