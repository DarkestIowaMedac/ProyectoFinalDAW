<?php

namespace App\Http\Controllers;

use App\Models\Naturaleza;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class NaturalezaController extends Controller
{
    public function verNaturalezas(): JsonResponse
    {
        $naturaleza = Naturaleza::all();  // Selecciona solo las columnas necesarias
        return response()->json($naturaleza);
    }
}
