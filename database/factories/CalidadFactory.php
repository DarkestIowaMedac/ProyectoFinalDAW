<?php

namespace Database\Factories;

use App\Models\Calidad;
use App\Models\Naturaleza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calidad>
 */
class CalidadFactory extends Factory
{
    protected $model = Calidad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $calidades = [
            'Muestra válida para examen.' => 'H.1.',
            'Muestra válida para examen aunque limitada por lipemia.' => 'H.2.',
        ];

        $texto = $this->faker->unique()->randomElement(array_keys($calidades));
        $codigo = $calidades[$texto];

        return [
            'codigo' => $codigo,
            'texto' => $texto,
            'idNaturaleza' => Naturaleza::factory(), // Genera una nueva Naturaleza automáticamente
        ];
    }
}
