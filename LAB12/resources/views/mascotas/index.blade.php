<!-- resources/views/mascotas/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Mascotas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-3xl bg-white p-8 rounded-xl shadow-md space-y-8">
        <h2 class="text-3xl font-bold text-center text-blue-600">Buscar Mascotas</h2>

        <!-- Formulario: Buscar por Tipo -->
        <form method="GET" action="{{ route('mascotas.tipo') }}" class="space-y-2">
            <label class="block text-gray-700 font-medium">Buscar por tipo:</label>
            <input type="text" name="tipo" placeholder="Perro, Gato..." 
                   class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Buscar por Tipo
            </button>
        </form>

        <!-- Formulario: Ordenar por Edad -->
        <form method="GET" action="{{ route('mascotas.edad') }}" class="space-y-2">
            <label class="block text-gray-700 font-medium">Ordenar por edad:</label>
            <select name="orden" 
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                <option value="asc">Ascendente</option>
                <option value="desc">Descendente</option>
            </select>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                Ordenar por Edad
            </button>
        </form>

        <!-- Formulario: Buscar por Tipo y Raza -->
        <form method="GET" action="{{ route('mascotas.tipo_raza') }}" class="space-y-2">
            <label class="block text-gray-700 font-medium">Buscar por tipo, raza y cantidad:</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <input type="text" name="tipo" placeholder="Tipo" 
                       class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400">
                <input type="text" name="raza" placeholder="Raza" 
                       class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400">
                <input type="number" name="cantidad" placeholder="Cantidad" 
                       class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md mt-2">
                Buscar por Tipo y Raza
            </button>
        </form>
    </div>
</body>
</html>
