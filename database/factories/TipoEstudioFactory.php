<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoEstudio>
 */
class TipoEstudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tiposEstudio = [
            'Estudio citológico cérvico-vaginal',
            'Estudio hematológico completo',
            'Estudio microscópico y químico de orina',
            'EStudio citológico de esputo',
            'Estudio citológico bucal',
        ];

        return [
            'nombre' => $this->faker->unique()->randomElement($tiposEstudio),
        ];
    }
}
