<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Games - @yield('title')</title>
</head>
<body>
{{-- filepath: c:\xampp\htdocs\DESARROLLO DE APLICACIONES\semana10\resources\views\games\create.blade.php --}}
@extends('layouts.layout')

@section('title', 'Registro de Videojuego')

@section('content')

    <h2>Formulario de Registro de Videojuego</h2>
    <form action="">
        Nombre del juego: <input type="text" name="nombre"><br>
        Precio: <input type="number" name="precio"><br>
        Stock: <input type="number" name="stock"><br>
        Categoría: <input type="text" name="categoria"><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
@endsection
</body>
</html>