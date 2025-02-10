<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class SedeController extends Controller
{
    /**
     * Devuelve todas las sedes en formato JSON.
     */
    public function index(): JsonResponse
    {
        $sedes = Sede::all();  // Selecciona solo las columnas necesarias
        return response()->json($sedes);
    }

    public function cambiarSede(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'idSede' => 'required|exists:sedes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error en la validación de los datos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::find($request->id);
        $user->idSede = $request->idSede;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Sede actualizada correctamente.',
            'user' => $user,
        ]);
    }
}