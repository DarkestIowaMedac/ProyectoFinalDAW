<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naturaleza extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * Restringe los campos a los que el usuario podrá escribir datos.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo',
        'tipoEstudio',
    ];

    /**
     * Una naturaleza tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class);
    }
}
