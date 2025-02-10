<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Naturaleza>
 */
class NaturalezaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $naturalezas = [
            'Biopsia' => 'B',
            'Biopsia veterinaria' => 'BV',
            'Cavidad bucal' => 'CB',
            'Citología vaginal' => 'CV',
            'Extensión sanguínea' => 'EX',
            'Orinas' => 'O',
            'Esputos' => 'E',
            'Semen' => 'ES',
            'Improntas' => 'I',
            'Frotis' => 'F',
        ];

        $nombre = $this->faker->unique()->randomElement(array_keys($naturalezas));
        $codigo = $naturalezas[$nombre];

        return [
            'codigo' => $codigo,
            'nombre' => $nombre,
        ];
    }
}
