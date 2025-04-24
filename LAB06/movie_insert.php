<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';
require_once 'model/Movie.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $awards = $_POST['awards'];
    $releaseYear = $_POST['release_year'];
    $length = $_POST['length'];
    $genreId = $_POST['genre_id'];

    $pelicula = new Movie(null, $title, $rating, $awards, $releaseYear, $length, $genreId);

    $bd = BaseMySql::conexion();
    $movieDB = new MovieDB();
    $movieDB->agregar($bd, $pelicula);

    header("Location: index.php");
    exit;
}
?>
