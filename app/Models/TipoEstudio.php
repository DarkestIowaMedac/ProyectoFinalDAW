<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
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
     * Un tipo de estudio tiene muchas calidades
     */
    public function calidades()
    {
        return $this->hasMany(Calidad::class);
    }

    /**
     * Un tipo de estudio tiene muchas interpretaciones
     */
    public function interpretaciones()
    {
        return $this->hasMany(Interpretacion::class);
    }
}
