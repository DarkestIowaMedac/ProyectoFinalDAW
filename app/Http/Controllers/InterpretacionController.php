<?php

namespace App\Http\Controllers;

use App\Models\Interpretacion;
use Illuminate\Http\JsonResponse;

class InterpretacionController extends Controller
{

    /**
     * Devuelve todas las sedes en formato JSON.
     */
    public function index(): JsonResponse
    {
        $interpretacion = Interpretacion::all();  
        return response()->json($interpretacion);
    }
}
