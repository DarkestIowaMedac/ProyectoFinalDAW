<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * Restringe los campos a los que el usuario podrá escribir datos.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ruta',
        'zoom',
    ];

    /**
     * Una imagen pertenece a una muestra
     */
    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
