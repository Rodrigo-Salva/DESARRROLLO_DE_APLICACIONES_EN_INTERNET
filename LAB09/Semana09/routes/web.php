<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiendaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
return "Bienvenidos alumnos de Tecsup";
});

Route::get('/demo', function () {
return "Aquí se muestra el contenido de Demo";
});

Route::get('/tienda', function () {
return "Aquí se muestra el contenido de Tienda";
});

Route::get('/tienda/create', function () {
return "Aquí se muestra el entorno de la creación de la Tienda";
});

// Ruta con un parámetro 
Route::get('/tienda/{post}', function ($post) {
return "Aquí se muestra todo el contenido de {$post}";
});


// Ruta con dos o más parámetros 
Route::get('/contenido/{post}/{categoria}', function ($post, $categoria) {
return "Aquí se muestra todo el contenido de {$post} de la categoría {$categoria}";
});


// Ruta con parámetros opcionales
Route::get('/lista/{post}/{categoria?}', function ($post, $categoria='hogar') {
return "Aquí se muestra todo el contenido de {$post} de la categoría {$categoria}";
});


//Rutas del controller
Route::get('/', [HomeController::class, 'index']);

Route::get('tienda', [TiendaController::class, 'index']);
Route::get('tienda/create', [TiendaController::class, 'create']);
Route::get('tienda/{post}', [TiendaController::class, 'show']);