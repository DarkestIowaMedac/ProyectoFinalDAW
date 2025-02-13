<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
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
     * Un formato tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'idFormato');
    }
}
