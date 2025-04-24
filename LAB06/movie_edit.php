<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/MovieDB.php';
require_once 'database/GenreDB.php'; 

$id = $_GET['id'];

$bd = BaseMySql::conexion();
$peliculasDB = new MovieDB();
$peli = $peliculasDB->ver($bd, $id);

$genreDB = new GenreDB();
$genres = $genreDB->listar($bd);
?>

<?php include 'layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-8 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-3xl font-bold mb-6 text-indigo-600 text-center">✏️ Editar Película</h2>

    <form action="movie_update.php" method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?= $peli['id'] ?>">

        <div>
            <label class="block text-sm font-medium text-gray-700">🎞️ Título</label>
            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($peli['title']) ?>"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">⭐ Rating</label>
            <input
                type="number"
                name="rating"
                min="1"
                max="5"
                value="<?= htmlspecialchars($peli['rating']) ?>"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🏆 Premios</label>
            <input
                type="number"
                name="awards"
                min="0"
                value="<?= htmlspecialchars($peli['awards']) ?>"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">📅 Año de Estreno</label>
            <input
                type="number"
                name="release_year"
                min="1900"
                max="2099"
                value="<?= htmlspecialchars($peli['release_year']) ?>"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">⏱️ Duración (minutos)</label>
            <input
                type="number"
                name="length"
                min="1"
                value="<?= htmlspecialchars($peli['length']) ?>"
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🎭 Género</label>
            <select
                name="genre_id"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-white"
            >
                <?php foreach ($genres as $genero): ?>
                    <option
                        value="<?= $genero['genre_id'] ?>"
                        <?= $peli['genre_id'] == $genero['genre_id'] ? 'selected' : '' ?>
                    >
                        <?= $genero['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-center pt-4">
            <button
                type="submit"
                class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 transition"
            >
                💾 Guardar Cambios
            </button>
        </div>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
