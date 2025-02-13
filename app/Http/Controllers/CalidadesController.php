<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalidadesController extends Controller
{
    public function verCalidades(): JsonResponse
    {
        $calidades = Calidad::all();  // Selecciona solo las columnas necesarias
        return response()->json($calidades);
    }
}
