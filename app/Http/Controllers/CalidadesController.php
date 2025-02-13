<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalidadesController extends Controller
{
    public function verCalidades(): JsonResponse
    {
        $calidades = Calidad::all();  // Selecciona solo las columnas necesarias
        return response()->json($calidades);
    }
}
