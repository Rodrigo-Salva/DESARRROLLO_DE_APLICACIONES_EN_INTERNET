<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $awards = $_POST['awards'];
    $release_year = $_POST['release_year'];
    $length = $_POST['length'];
    $genre_id = $_POST['genre_id'];

    $bd = BaseMySql::conexion();
    $peliculasDB = new MovieDB();

    $peliculasDB->actualizar($bd, $id, $title, $rating, $awards, $release_year, $length, $genre_id);

    header("Location: movie_show.php?id=$id");
    exit();
}
