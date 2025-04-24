<?php
require_once 'connection/BaseMySQL.php';
require_once 'database/GenreDB.php';

$bd = BaseMySql::conexion();
$genreDB = new GenreDB();
$genres = $genreDB->listar($bd);
?>

<?php include 'layout/header.php'; ?>

<div class="max-w-xl mx-auto px-4 py-8 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-6 text-indigo-600 text-center">🎬 Registrar Nueva Película</h2>

    <form action="movie_insert.php" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">🎞️ Título</label>
            <input type="text" name="title" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">⭐ Rating</label>
            <input type="number" name="rating" min="1" max="5" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🏆 Premios</label>
            <input type="number" name="awards" min="0" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">📅 Año de Estreno</label>
            <input type="number" name="release_year" min="1900" max="2099" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">⏱️ Duración (minutos)</label>
            <input type="number" name="length" min="1"
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🎭 Género</label>
            <select name="genre_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-white">
                <?php foreach ($genres as $genero): ?>
                    <option value="<?= $genero['genre_id'] ?>"><?= $genero['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-center pt-4">
            <button type="submit"
                    class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 transition">
                💾 Registrar Película
            </button>
        </div>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
