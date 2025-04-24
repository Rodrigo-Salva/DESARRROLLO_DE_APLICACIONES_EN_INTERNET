<?php

class GenreDB {
    // Método para listar los géneros desde la base de datos
    public function listar($bd) {
        $sql = "SELECT genre_id, name FROM genres ORDER BY name";
        $query = $bd->prepare($sql);
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $generos;
    }
}

?>
