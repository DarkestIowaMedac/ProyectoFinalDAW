<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sede>
 */
class SedeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sedes = [
            'Albacete' => 'A',
            'Alicante' => 'AL',
            'Alicante II' => 'ALII',
            'Almería' => 'I',
            'Córdoba' => 'C',
            'Leganés' => 'L',
            'Granada' => 'G',
            'Huelva' => 'H',
            'Jerez' => 'J',
            'Madrid' => 'M',
            'Málaga' => 'MG',
            'Murcia' => 'MU',
            'Sevilla' => 'S',
            'Valencia' => 'V',
            'Zaragoza' => 'Z'
        ];

        $nombre = $this->faker->unique()->randomElement(array_keys($sedes));
        $codigo = $sedes[$nombre];

        return [
            'codigo' => $codigo,
            'nombre' => $nombre,
        ];
    }
}
