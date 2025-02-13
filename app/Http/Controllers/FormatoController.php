<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormatoController extends Controller
{
    /**
     * Muestra todos los formatos en la base de datos.
     */
    public function index()
    {
        $formatos = Formato::all();

        if ($formatos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron formatos.'], 404);
        }
        return response()->json($formatos, 200);
    }
    /**
     * Crea un nuevo formato en la base de datos.
     */
    public function crearFormato(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $formato = Formato::create([
                'nombre' => $request->nombre,
            ]);

            return response()->json([ 'message' => 'Formato creado con éxito: ' , 'formato' => $formato], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el formato: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Edita un formato existente en la base de datos.
     */
    public function editarFormato(Request $request, $id)
    {
        $formato = Formato::find($id);

        if (!$formato) {
            return response()->json(['error' => 'Formato no encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $formato->nombre = $request->nombre;

        try {
            $formato->save();

            return response()->json(['message' => 'Formato actualizado con éxito', 'formato' => $formato], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el formato: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Elimina un formato de la base de datos.
     */
    public function eliminarFormato($id)
    {
        $formato = Formato::find($id);

        if (!$formato) {
            return response()->json(['error' => 'Formato no encontrado.'], 404);
        }

        try {
            $formato->delete();

            return response()->json(['message' => 'Formato eliminado con éxito.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el formato: ' . $e->getMessage()], 500);
        }
    }
}