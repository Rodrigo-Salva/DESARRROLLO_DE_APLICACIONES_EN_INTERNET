<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        return view('mascotas.index');
    }

    // Consulta 1
    public function porTipo(Request $request)
    {
        $tipo = $request->input('tipo');
        $mascotas = Mascota::where('tipo', $tipo)->get();
        return view('mascotas.resultado', compact('mascotas'));
    }

    // Consulta 2
    public function porEdad(Request $request)
    {
        $orden = $request->input('orden', 'asc');
        $mascotas = Mascota::orderBy('edad', $orden)->get();
        return view('mascotas.resultado', compact('mascotas'));
    }

    // Consulta 3
    public function porTipoYraza(Request $request)
    {
        $tipo = $request->input('tipo');
        $raza = $request->input('raza');
        $cantidad = $request->input('cantidad', 5);

        $mascotas = Mascota::where('tipo', $tipo)
                    ->where('raza', $raza)
                    ->limit($cantidad)
                    ->get();

        return view('mascotas.resultado', compact('mascotas'));
    }
}

