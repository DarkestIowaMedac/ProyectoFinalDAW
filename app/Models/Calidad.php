<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'calidades';

    /**
     * Restringe los campos a los que el usuario podrá escribir datos.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo',
        'texto',
        'idNaturaleza',
    ];

    /**
     * Una calidad tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'idCalidad');
    }

    /**
     * Una calidad pertenece a una naturaleza
     */
    public function naturalezas()
    {
        return $this->belongsTo(Naturaleza::class, 'idNaturaleza');
    }
}
