<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpretacion extends Model
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
        'texto',
    ];

    /**
     * Una interpretación tiene muchas muestras.
     * En lugar de crear una entidad para la tabla pivote, paso el nombre
     * de dicha tabla como segundo argumento al método belongsToMany.
     * Adicionalmente añado los nombres de las claves que relacionan ambas
     * entidades con la tabla pivote.
     * Funcionamiento de las relaciones M:N en Eloquent:
     * https://laravel.com/docs/11.x/eloquent-relationships#many-to-many
     * Ver también:
     * https://desarrolloweb.com/articulos/relaciones-n-a-m-laravel-eloquent.html
     */
    public function muestras()
    {
        return $this->belongsToMany(Muestra::class, 'interpretacion_muestra', 'idInterpretacion', 'idMuestra');
    }

    /**
     * Una interpretación pertenece a una naturaleza.
     */
    public function naturalezas()
    {
        return $this->belongsTo(Naturaleza::class);
    }
}
