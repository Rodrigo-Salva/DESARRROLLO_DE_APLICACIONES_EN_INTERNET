<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/', [MascotaController::class, 'index'])->name('mascotas.index');
Route::get('/mascotas/tipo', [MascotaController::class, 'porTipo'])->name('mascotas.tipo');
Route::get('/mascotas/edad', [MascotaController::class, 'porEdad'])->name('mascotas.edad');
Route::get('/mascotas/filtro', [MascotaController::class, 'porTipoYraza'])->name('mascotas.tipo_raza');
