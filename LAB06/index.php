<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';

$bd = BaseMySql::conexion();
$peliculasDB = new MovieDB();
$peliculas = $peliculasDB->listar($bd);
?>

<?php include 'layout/header.php'; ?>

<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">🎬 Listado de Películas</h2>

    <div class="mb-4 text-right">
        <a href="movie_new.php" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
            ➕ Agregar Nueva Película
        </a>
    </div>

    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white border border-gray-200 text-sm text-gray-800">
            <thead class="bg-indigo-100 text-indigo-800 font-semibold text-left">
                <tr>
                    <th class="px-4 py-3 border-b">🎞️ Título</th>
                    <th class="px-4 py-3 border-b">⭐ Rating</th>
                    <th class="px-4 py-3 border-b">🏆 Premios</th>
                    <th class="px-4 py-3 border-b">📅 Año</th>
                    <th class="px-4 py-3 border-b">🎭 Género</th>
                    <th class="px-4 py-3 border-b text-center">⚙️ Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peliculas as $peli): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 border-b"><?= htmlspecialchars($peli['title']) ?></td>
                        <td class="px-4 py-2 border-b"><?= htmlspecialchars($peli['rating']) ?></td>
                        <td class="px-4 py-2 border-b"><?= htmlspecialchars($peli['awards']) ?></td>
                        <td class="px-4 py-2 border-b"><?= htmlspecialchars($peli['release_year']) ?></td>
                        <td class="px-4 py-2 border-b"><?= htmlspecialchars($peli['genre_name']) ?></td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <a href="movie_show.php?id=<?= $peli['id'] ?>" class="text-blue-600 hover:text-blue-800 font-semibold">👁️ Ver</a>
                            <a href="movie_edit.php?id=<?= $peli['id'] ?>" class="text-green-600 hover:text-green-800 font-semibold">✏️ Editar</a>
                            <a href="movie_delete.php?id=<?= $peli['id'] ?>" class="text-red-600 hover:text-red-800 font-semibold" onclick="return confirm('¿Estás seguro de eliminar esta película?')">🗑️ Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
