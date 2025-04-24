<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';

$id = $_GET['id'];

$bd = BaseMySql::conexion();
$peliculasDB = new MovieDB();
$peli = $peliculasDB->ver($bd, $id);
?>

<?php include 'layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-8 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-3xl font-bold mb-6 text-indigo-600 text-center">🎬 Detalles de la Película</h2>

    <div class="space-y-4">
        <div><strong>Título:</strong> <?= htmlspecialchars($peli['title']) ?></div>
        <div><strong>Rating:</strong> <?= htmlspecialchars($peli['rating']) ?> ⭐</div>
        <div><strong>Premios:</strong> <?= htmlspecialchars($peli['awards']) ?></div>
        <div><strong>Año de Estreno:</strong> <?= htmlspecialchars($peli['release_year']) ?></div>
        <div><strong>Duración:</strong> <?= htmlspecialchars($peli['length']) ?> minutos</div>
        <div><strong>Género:</strong> <?= htmlspecialchars($peli['genre_name']) ?></div>
    </div>

    <div class="mt-6 flex justify-center space-x-4">
        <a href="movie_edit.php?id=<?= $peli['id'] ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">✏️ Editar</a>
        <a href="movie_delete.php?id=<?= $peli['id'] ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar esta película?')">🗑️ Eliminar</a>
        <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Regresar</a>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
