<!-- resources/views/mascotas/resultado.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Resultados de Búsqueda</h2>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 shadow-sm">
                <thead>
                    <tr class="bg-blue-100 text-blue-800">
                        <th class="px-4 py-3 border-b text-left">Nombre</th>
                        <th class="px-4 py-3 border-b text-left">Tipo</th>
                        <th class="px-4 py-3 border-b text-left">Edad</th>
                        <th class="px-4 py-3 border-b text-left">Raza</th>
                        <th class="px-4 py-3 border-b text-left">Peso</th>
                        <th class="px-4 py-3 border-b text-left">Fecha Adopción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mascotas as $mascota)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $mascota->nombre }}</td>
                            <td class="px-4 py-2 border-b">{{ $mascota->tipo }}</td>
                            <td class="px-4 py-2 border-b">{{ $mascota->edad }}</td>
                            <td class="px-4 py-2 border-b">{{ $mascota->raza }}</td>
                            <td class="px-4 py-2 border-b">{{ $mascota->peso }} kg</td>
                            <td class="px-4 py-2 border-b">{{ $mascota->fecha_adopcion }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No se encontraron mascotas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('mascotas.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md">
                ← Volver
            </a>
        </div>
    </div>
</body>
</html>
