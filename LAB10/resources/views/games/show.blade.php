<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Games</title>
</head>
<body>
<h1>Videojuegos</h1>
@if ($category)
<h3>Bienvenido a la página del juego {{ $game }} que pertenece a la categoría {{
$category }}</h3>
@else
<h3>Bienvenido a la página del juego {{ $game }}</h3>
@endif
<h4>La fecha actual es {{ $date }}</h4>
</body>
</html>