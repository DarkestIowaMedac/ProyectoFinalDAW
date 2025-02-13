<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NaturalezaController extends Controller
{
    public function verNaturalezas(): JsonResponse
    {
        $naturaleza = Naturaleza::all();  // Selecciona solo las columnas necesarias
        return response()->json($naturaleza);
    }
}
