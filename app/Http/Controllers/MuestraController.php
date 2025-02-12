<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Muestra;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
class MuestraController extends Controller
{
    public function crearMuestra(Request $request){
        //Clase Validator método estático make: Se encarga de validar en este caso todos los campos (all)
        //? exists: Comprueba que existe el campo en la tabla y para la columna
        //? in: comprueba de una lista de palabras
        //? max:51200. Se refiere a los KB
        
        //! CONSIDERACIONES SOBRE LAS IMAGENES.
        /*Las imagenes de análisis de citodiagnóstico deben tener cuidado hasta el más último detalle.
        No se aceptarán imagenes que no sean soportados correctamente en web, siendo además recomendado subir imagenes
        de tipo TIFF (sin pérdidas). Además, será necesaria una resolución de 150 dpi hasta un máximo de 300
        y un tamaño de 2000x2000 recomendado para su visualización (no < 1500)
        correcta impresión. */

        $validator = Validator::make($request->all(),[
            'idSede' => 'required|exists:sedes,id',
            'idFormato' => 'required|exists:formato,id',
            'idNaturaleza' => 'required|exists:naturaleza,id',
            'idCalidad' => 'required|exists:calidad,id',
            'descripcionCalidad' => 'required|string|max:255|min:8',
            'codigoInterpretacion' => 'required|exists:interpretacion,codigo',
            'descripcionInterpretacion' => 'required|string|max:255|min:8',
            'imagenes' => 'required|array|min:1',
            'imagenes.*' => 'image|max:51200'
        ]);

        //Mensajes de fallo de validación por defecto:
        if($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        
        //Creación de la muestra (imagen más adelante)
        $muestra = new Muestra();
        $muestra->idUser = Auth::id();
        $muestra->idSede = $request->idSede;
        $muestra->idFormato = $request->idFormato;
        $muestra->idNaturaleza = $request->idNaturaleza;
        $muestra->idCalidad = $request->idCalidad;
        $muestra->descripcionCalidad = $request->descripcionCalidad;
        $muestra->codigoInterpretacion = $request->codigoInterpretacion;
        $muestra->descripcionInterpretacion = $request->descripcionInterpretacion;

        //Gestión y creación de la imagen si cumple otra serie de validaciones
        $imagenes = [];
        $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp', 'tiff', 'tif'];
        foreach ($request->file('imagenes') as $imagen) {
            $extension = $imagen->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                return response()->json(['error' => 'El tipo de imagen debe ser uno de los siguientes: ' . implode(', ', $allowedExtensions) . '.'], 422);
            }
            list($width, $height) = getimagesize($imagen);
            if ($width < 1500 || $height < 1500) {
                return response()->json(['error' => 'La imagen debe tener al menos 1500x1500 píxeles.'], 422);
            }
            if ($width >2300 || $height > 3400){
                return response()->json(['error' => 'La imagen no cabrá en el folio (menos de 2300x3400)'], 422);
            }
            $path = $imagen->store('imagenes','public');
            $imagenes[] = $path;

            //Extensión para el cálculo del DPI
            if (extension_loaded('imagick')) {
            try {
                $imagick = new \Imagick($imagen);
                $resolution = $imagick->getImageResolution();
                if ($resolution['x'] < 150 || $resolution['y'] < 150 || $resolution['x'] > 300 || $resolution['y'] > 300) {
                    return response()->json(['error' => 'La imagen debe tener una resolución de entre 150 y 300'], 422);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al procesar la imagen' . $e->getMessage()], 422);
            }
            }
            // Optimizar la imagen
            // $optimizerChain = new OptimizerChain();
            // $optimizerChain->optimize(public_path($path));
        }
        //Creación de la parte de las imagenes como json_encode
        $muestra->imagenes = json_encode($imagenes);
        
        //Inserción en la base de datos
        try {
            $muestra->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al guardar la muestra: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
        return response()->json($muestra, 201);
    }

    /*
    INSTALAR IMAGICK PARA LA LECTURA DEL DPI:
    sudo apt-get update
    sudo apt-get install -y gcc make autoconf libc-dev pkg-config libmagickwand-dev
    sudo pecl install imagick
    echo "extension=imagick.so" | sudo tee /etc/php/$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")/cli/conf.d/20-imagick.ini
    sudo service php$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")-fpm restart
    php -m | grep imagick

    INSTALAR Y USAR OPTIMIZADOR DE IMÁGENES:
    composer require spatie/image-optimizer
    php artisan vendor:publish --provider="Spatie\ImageOptimizer\OptimizerServiceProvider" --tag="config"

    use ImageOptimizer;


    ImageOptimizer::optimize($pathToImage);
    $optimizerChain->optimize([$pathToImage1, $pathToImage2]);
    */
    public function verTodas(Request $request) {

        $idUsuario = Auth::id();
        $muestras = Muestra::where('idUser', $idUsuario)->get();
        if ($muestras->isEmpty()) {
            return response()->json(['message' => 'No hay muestras disponibles para este usuario.'], 404);
        }
        return response()->json($muestras, 200);
    }

        public function editarMuestra(Request $request, $idMuestra){
            $idUsuario = Auth::id();
            $muestra = Muestra::find($idMuestra);
        
            if (!$muestra) {
                return response()->json(['error' => 'La muestra no existe.'], 404);
            }

            if ($muestra->idUsuario != $idUsuario) {
                return response()->json(['error' => 'No tienes permiso para editar esta muestra.'], 403);
            }

            $validator = Validator::make($request->all(),[
                'idSede' => 'required|exists:sedes,id',
                'idFormato' => 'required|exists:formato,id',
                'idNaturaleza' => 'required|exists:naturaleza,id',
                'idCalidad' => 'required|exists:calidad,id',
                'descripcionCalidad' => 'required|string|max:255|min:8',
                'codigoInterpretacion' => 'required|exists:interpretacion,codigo',
                'descripcionInterpretacion' => 'required|string|max:255|min:8',
                'imagenes' => 'required|array|min:1',
                'imagenes.*' => 'image|max:51200'
            ]);

            //Mensajes de fallo de validación por defecto:
            if($validator->fails()) {
                return response()->json($validator->errors(),422);
            }
            
            //Edición de la muestra (imagen más adelante)
        
            $muestra->idUser = Auth::id();
            $muestra->idSede = $request->idSede;
            $muestra->idFormato = $request->idFormato;
            $muestra->idNaturaleza = $request->idNaturaleza;
            $muestra->idCalidad = $request->idCalidad;
            $muestra->descripcionCalidad = $request->descripcionCalidad;
            $muestra->codigoInterpretacion = $request->codigoInterpretacion;
            $muestra->descripcionInterpretacion = $request->descripcionInterpretacion;

            //Gestión y creación de la imagen si cumple otra serie de validaciones
            $imagenes = [];
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp', 'tiff', 'tif'];
            foreach ($request->file('imagenes') as $imagen) {
                $extension = $imagen->getClientOriginalExtension();
                if (!in_array($extension, $allowedExtensions)) {
                    return response()->json(['error' => 'El tipo de imagen debe ser uno de los siguientes: ' . implode(', ', $allowedExtensions) . '.'], 422);
                }
                list($width, $height) = getimagesize($imagen);
                if ($width < 1500 || $height < 1500) {
                    return response()->json(['error' => 'La imagen debe tener al menos 1500x1500 píxeles.'], 422);
                }
                if ($width >2300 || $height > 3400){
                    return response()->json(['error' => 'La imagen no cabrá en el folio (menos de 2300x3400)'], 422);
                }
                $path = $imagen->store('imagenes','public');
                $imagenes[] = $path;

                //Extensión para el cálculo del DPI
                if (extension_loaded('imagick')) {
                try {
                    $imagick = new \Imagick($imagen);
                    $resolution = $imagick->getImageResolution();
                    if ($resolution['x'] < 150 || $resolution['y'] < 150 || $resolution['x'] > 300 || $resolution['y'] > 300) {
                        return response()->json(['error' => 'La imagen debe tener una resolución de entre 150 y 300'], 422);
                    }
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Error al procesar la imagen' . $e->getMessage()], 422);
                }
                }
                // Optimizar la imagen
                // $optimizerChain = new OptimizerChain();
                // $optimizerChain->optimize(public_path($path));
            }
            //Creación de la parte de las imagenes como json_encode
            $muestra->imagenes = json_encode($imagenes);
            
            //Inserción en la base de datos
            try {
                $muestra->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['error' => 'Error al actualizar la muestra: ' . $e->getMessage()], 500);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
            }
            return response()->json($muestra, 201);
        }
    public function verMuestra(Request $request, $idMuestra) {

        // Se tiene que comprobar que la idUsuario de la muestra, es decir, su propietario, 
        //coincide con el usuario autenticado para evitar trapicheos en el front
        $idUsuario = Auth::id();
        $muestra = Muestra::find($idMuestra);
    
        if (!$muestra) {
            return response()->json(['error' => 'La muestra no existe.'], 404);
        }

        if ($muestra->idUser !== $idUsuario) {
            return response()->json(['error' => 'No tienes permiso para ver esta muestra.'], 403);
        }
    
        return response()->json($muestra, 200);
    }
    public function borrarMuestra(Request $request, $idMuestra) {

        // Se tiene que comprobar que la idUsuario de la muestra, es decir, su propietario, 
        //coincide con el usuario autenticado para evitar trapicheos en el front
        $idUsuario = Auth::id();
        $muestra = Muestra::find($idMuestra);
    
        if (!$muestra) {
            return response()->json(['error' => 'La muestra no existe.'], 404);
        }

        if ($muestra->idUser !== $idUsuario) {
            return response()->json(['error' => 'No tienes permiso para borrar esta muestra.'], 403);
        }
        $muestra->delete();
        return response()->json(['message' => 'Muestra borrada con éxito.'], 200);
    }
}

