<?php

namespace Database\Factories;

use App\Models\Naturaleza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interpretacion>
 */
class InterpretacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $interpretaciones = [
            'Predominio de células epiteliales escamosas superficiales.' => '1.1.',
            'Predominio de células epiteliales escamosas intermedias.' => '1.2.',
        ];

        $texto = $this->faker->unique()->randomElement(array_keys($interpretaciones));
        $codigo = $interpretaciones[$texto];

        return [
            'codigo' => $codigo,
            'texto' => $texto,
        ];
    }
}
