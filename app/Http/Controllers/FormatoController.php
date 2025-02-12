<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    /**
     * Muestra una lista de formatos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatos = Formato::all();
        return response()->json($formatos);
    }

    /**
     * Muestra el formulario para crear un nuevo formato.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aquí podrías devolver una vista si trabajas con Blade
        return response()->json(['message' => 'Mostrar formulario de creación']);
    }

    /**
     * Almacena un nuevo formato en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $formato = Formato::create($validatedData);
        return response()->json(['message' => 'Formato creado con éxito', 'formato' => $formato]);
    }

    /**
     * Muestra un formato específico.
     *
     * @param  \App\Models\Formato  $formato
     * @return \Illuminate\Http\Response
     */
    public function show(Formato $formato)
    {
        return response()->json($formato);
    }

    /**
     * Muestra el formulario para editar un formato existente.
     *
     * @param  \App\Models\Formato  $formato
     * @return \Illuminate\Http\Response
     */
    public function edit(Formato $formato)
    {
        // Aquí podrías devolver una vista si trabajas con Blade
        return response()->json(['message' => 'Mostrar formulario de edición', 'formato' => $formato]);
    }

    /**
     * Actualiza un formato existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formato  $formato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formato $formato)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $formato->update($validatedData);
        return response()->json(['message' => 'Formato actualizado con éxito', 'formato' => $formato]);
    }

    /**
     * Elimina un formato de la base de datos.
     *
     * @param  \App\Models\Formato  $formato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formato $formato)
    {
        $formato->delete();
        return response()->json(['message' => 'Formato eliminado con éxito']);
    }
}
