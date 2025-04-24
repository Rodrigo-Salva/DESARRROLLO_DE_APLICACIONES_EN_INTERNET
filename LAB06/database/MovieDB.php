<?php

class MovieDB {
    // Método para listar todas las películas con su género
    public function listar($bd) {
        $sql = "SELECT
                    movies.id, movies.title, movies.rating, movies.awards,
                    movies.release_year, genres.name as genre_name
                FROM movies, genres
                WHERE movies.genre_id = genres.genre_id";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }

    // Método para obtener los detalles de una película específica
    public function detalle($bd, $id) {
        $sql = "SELECT
                    movies.id, movies.title, movies.rating, movies.awards,
                    movies.release_year, movies.length, movies.genre_id,
                    genres.name as genre_name
                FROM movies, genres
                WHERE movies.genre_id = genres.genre_id
                AND movies.id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $vector = $query->fetch(PDO::FETCH_ASSOC);
        $pelicula = new Movie(
            $vector['id'], $vector['title'], $vector['rating'],
            $vector['awards'], $vector['release_year'], $vector['length'],
            $vector['genre_id']
        );
        return $pelicula;
    }

    // Método para agregar una nueva película a la base de datos
    public function agregar($bd, $pelicula) {
        $sql = "INSERT INTO movies(title, rating, awards, release_year, length, genre_id)
                VALUES (:title, :rating, :awards, :releaseYear, :length, :genreId)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle());
        $query->bindValue(':rating', $pelicula->getRating());
        $query->bindValue(':awards', $pelicula->getAwards());
        $query->bindValue(':releaseYear', $pelicula->getReleaseYear());
        $query->bindValue(':length', $pelicula->getLength());
        $query->bindValue(':genreId', $pelicula->getGenreId());
        $query->execute();
    }

    public function ver($bd, $id) {
        $sql = "SELECT m.*, g.name AS genre_name FROM movies m JOIN genres g ON m.genre_id = g.genre_id WHERE m.id = :id";
        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($bd, $id) {
        $sql = "DELETE FROM movies WHERE id = :id";
        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    
    public function actualizar($bd, $id, $title, $rating, $awards, $release_year, $length, $genre_id) {
        $query = "UPDATE movies SET title = :title, rating = :rating, awards = :awards, release_year = :release_year, length = :length, genre_id = :genre_id WHERE id = :id";
        $stmt = $bd->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':awards', $awards, PDO::PARAM_INT);
        $stmt->bindParam(':release_year', $release_year, PDO::PARAM_INT);
        $stmt->bindParam(':length', $length, PDO::PARAM_INT);
        $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $stmt->execute();

    } 
}

?>
