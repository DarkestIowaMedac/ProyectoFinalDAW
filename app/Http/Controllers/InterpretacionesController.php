<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interpretacion;
use Symfony\Component\HttpFoundation\JsonResponse;

class InterpretacionesController extends Controller
{
    public function verInterpretaciones(): JsonResponse
    {
        $interpretaciones = Interpretacion::all();  // Selecciona solo las columnas necesarias
        return response()->json($interpretaciones);
    }
}
