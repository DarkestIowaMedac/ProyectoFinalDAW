<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * Restringe los campos a los que el usuario podrá escribir datos.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Una calidad tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class);
    }

    /**
     * Una calidad pertenece a un tipo de estudio
     */
    public function tiposEstudios()
    {
        return $this->belongsTo(TipoEstudio::class);
    }
}
