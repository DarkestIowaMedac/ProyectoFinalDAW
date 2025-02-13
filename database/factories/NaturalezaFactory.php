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
            'Biopsia de bazo' => 'BB',
            'Biopsia de cerebro' => 'BCB',
            'Biopsia de corazón' => 'BC',
            'Biopsia de esófago' => 'BEF',
            'Biopsia de estómago' => 'BES',
            'Biopsia de feto' => 'BF',
            'Biopsia de hígado' => 'BH',
            'Biopsia de intestino' => 'BI',
            'Biopsia de lengua' => 'BL',
            'Biopsia de ovario' => 'BO',
            'Biopsia de páncreas' => 'BPA',
            'Biopsia de piel' => 'BPI',
            'Biopsia de pulmón' => 'BP',
            'Biopsia de riñón' => 'BR',
            'Biopsia de testículo' => 'BT',
            'Biopsia de trompa de falopio' => 'BTF',
            'Biopsia de útero' => 'BU',
            'Biopsia veterinaria de bazo' => 'BVB',
            'Biopsia veterinaria de cerebro' => 'BVCB',
            'Biopsia veterinaria de corazón' => 'BVC',
            'Biopsia veterinaria de esófago' => 'BVEF',
            'Biopsia veterinaria de estómago' => 'BVES',
            'Biopsia veterinaria de feto' => 'BVF',
            'Biopsia veterinaria de hígado' => 'BVH',
            'Biopsia veterinaria de intestino' => 'BVI',
            'Biopsia veterinaria de lengua' => 'BVL',
            'Biopsia veterinaria de ovario' => 'BVO',
            'Biopsia veterinaria de páncreas' => 'BVPA',
            'Biopsia veterinaria de piel' => 'BVPI',
            'Biopsia veterinaria de pulmón' => 'BVP',
            'Biopsia veterinaria de riñón' => 'BVR',
            'Biopsia veterinaria de testículo' => 'BVT',
            'Biopsia veterinaria de trompa de falopio' => 'BVTF',
            'Biopsia veterinaria de útero' => 'BVU',
            'Estudio citológico bucal' => 'CB',
            'Estudio citológico cérvico-vaginal' => 'CV',
            'Estudio citológico de esputo' => 'E',
            'Estudio citológico de frotis' => 'F',
            'Estudio citológico de impronta' => 'I',
            'Estudio citológico de semen' => 'ES',
            'Estudio hematológico completo' => 'EX',
            'Estudio microscópico y químico de orina' => 'O',
        ];

        $tipoEstudio = $this->faker->unique()->randomElement(array_keys($naturalezas));
        $codigo = $naturalezas[$tipoEstudio];

        return [
            'codigo' => $codigo,
            'tipoEstudio' => $tipoEstudio,
        ];
    }
}
