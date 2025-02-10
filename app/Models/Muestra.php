<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
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
        'descripcionCalidad',
        'fecha',
        'organo',
    ];

    /**
     * Una muestra tiene muchas interpretaciones.
     * En lugar de crear una entidad para la tabla pivote, paso el nombre
     * de dicha tabla como segundo argumento al método belongsToMany.
     * Adicionalmente añado los nombres de las claves que relacionan ambas
     * entidades con la tabla pivote.
     * Funcionamiento de las relaciones M:N en Eloquent:
     * https://laravel.com/docs/11.x/eloquent-relationships#many-to-many
     * Ver también:
     * https://desarrolloweb.com/articulos/relaciones-n-a-m-laravel-eloquent.html
     */
    public function interpretacion()
    {
        return $this->belongsToMany(interpretacion::class, 'interpretacion_muestra', 'idInterpretacion', 'idMuestra');
    }

    /**
     * Una muestra pertenece a una calidad
     */
    public function calidad()
    {
        return $this->belongsTo(Calidad::class);
    }

    /**
     * Una muestra tiene muchas imágenes
     */
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    /**
     * Una muestra pertenece a una naturaleza
     */
    public function naturaleza()
    {
        return $this->belongsTo(Naturaleza::class);
    }

    /**
     * Una muestra pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Una muestra pertenece a una sede
     */
    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    /**
     * Una muestra pertenece a un formato
     */
    public function formato()
    {
        return $this->belongsTo(Formato::class);
    }
}
