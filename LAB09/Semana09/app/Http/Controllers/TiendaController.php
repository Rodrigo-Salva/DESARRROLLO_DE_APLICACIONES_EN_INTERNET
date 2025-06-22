<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(){
        return "Aqui se muestra todo el contenido de la tienda";
    }


    public function create(){
        return "Aqui se muestra el entorno de la creacion de la tienda";
    }

    public function show($post){
        return "Aqui se muestra todo el contenido {$post}";
    }
}
