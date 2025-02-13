<?php

namespace Database\Seeders;

use App\Models\Calidad;
use App\Models\Formato;
use App\Models\Interpretacion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Naturaleza;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Crea datos reales y de prueba.
     */
    public function run(): void
    {
        $sedes = [
            ['codigo' => 'A', 'nombre' => 'Albacete'],
            ['codigo' => 'AL', 'nombre' => 'Alicante'],
            ['codigo' => 'ALII', 'nombre' => 'Alicante II'],
            ['codigo' => 'I', 'nombre' => 'Almería'],
            ['codigo' => 'C', 'nombre' => 'Córdoba'],
            ['codigo' => 'L', 'nombre' => 'Leganés'],
            ['codigo' => 'G', 'nombre' => 'Granada'],
            ['codigo' => 'H', 'nombre' => 'Huelva'],
            ['codigo' => 'J', 'nombre' => 'Jerez'],
            ['codigo' => 'M', 'nombre' => 'Madrid'],
            ['codigo' => 'MG', 'nombre' => 'Málaga'],
            ['codigo' => 'MU', 'nombre' => 'Murcia'],
            ['codigo' => 'S', 'nombre' => 'Sevilla'],
            ['codigo' => 'V', 'nombre' => 'Valencia'],
            ['codigo' => 'Z', 'nombre' => 'Zaragoza']
        ];

        foreach ($sedes as $sede) {
            Sede::create($sede);
        }

        $naturalezas = [
            ['codigo' => 'BB', 'tipoEstudio' => 'Biopsia de bazo'],
            ['codigo' => 'BCB', 'tipoEstudio' => 'Biopsia de cerebro'],
            ['codigo' => 'BC', 'tipoEstudio' => 'Biopsia de corazón'],
            ['codigo' => 'BEF', 'tipoEstudio' => 'Biopsia de esófago'],
            ['codigo' => 'BES', 'tipoEstudio' => 'Biopsia de estómago'],
            ['codigo' => 'BF', 'tipoEstudio' => 'Biopsia de feto'],
            ['codigo' => 'BH', 'tipoEstudio' => 'Biopsia de hígado'],
            ['codigo' => 'BI', 'tipoEstudio' => 'Biopsia de intestino'],
            ['codigo' => 'BL', 'tipoEstudio' => 'Biopsia de lengua'],
            ['codigo' => 'BO', 'tipoEstudio' => 'Biopsia de ovario'],
            ['codigo' => 'BPA', 'tipoEstudio' => 'Biopsia de páncreas'],
            ['codigo' => 'BPI', 'tipoEstudio' => 'Biopsia de piel'],
            ['codigo' => 'BP', 'tipoEstudio' => 'Biopsia de pulmón'],
            ['codigo' => 'BR', 'tipoEstudio' => 'Biopsia de riñón'],
            ['codigo' => 'BT', 'tipoEstudio' => 'Biopsia de testículo'],
            ['codigo' => 'BTF', 'tipoEstudio' => 'Biopsia de trompa de falopio'],
            ['codigo' => 'BU', 'tipoEstudio' => 'Biopsia de útero'],
            ['codigo' => 'BVB', 'tipoEstudio' => 'Biopsia veterinaria de bazo'],
            ['codigo' => 'BVCB', 'tipoEstudio' => 'Biopsia veterinaria de cerebro'],
            ['codigo' => 'BVC', 'tipoEstudio' => 'Biopsia veterinaria de corazón'],
            ['codigo' => 'BVEF', 'tipoEstudio' => 'Biopsia veterinaria de esófago'],
            ['codigo' => 'BVES', 'tipoEstudio' => 'Biopsia veterinaria de estómago'],
            ['codigo' => 'BVF', 'tipoEstudio' => 'Biopsia veterinaria de feto'],
            ['codigo' => 'BVH', 'tipoEstudio' => 'Biopsia veterinaria de hígado'],
            ['codigo' => 'BVI', 'tipoEstudio' => 'Biopsia veterinaria de intestino'],
            ['codigo' => 'BVL', 'tipoEstudio' => 'Biopsia veterinaria de lengua'],
            ['codigo' => 'BVO', 'tipoEstudio' => 'Biopsia veterinaria de ovario'],
            ['codigo' => 'BVPA', 'tipoEstudio' => 'Biopsia veterinaria de páncreas'],
            ['codigo' => 'BVPI', 'tipoEstudio' => 'Biopsia veterinaria de piel'],
            ['codigo' => 'BVP', 'tipoEstudio' => 'Biopsia veterinaria de pulmón'],
            ['codigo' => 'BVR', 'tipoEstudio' => 'Biopsia veterinaria de riñón'],
            ['codigo' => 'BVT', 'tipoEstudio' => 'Biopsia veterinaria de testículo'],
            ['codigo' => 'BVTF', 'tipoEstudio' => 'Biopsia veterinaria de trompa de falopio'],
            ['codigo' => 'BVU', 'tipoEstudio' => 'Biopsia veterinaria de útero'],
            ['codigo' => 'CB', 'tipoEstudio' => 'Estudio citológico bucal'],
            ['codigo' => 'CV', 'tipoEstudio' => 'Estudio citológico cérvico-vaginal'],
            ['codigo' => 'E', 'tipoEstudio' => 'Estudio citológico de esputo'],
            ['codigo' => 'F', 'tipoEstudio' => 'Estudio citológico de frotis'],
            ['codigo' => 'I', 'tipoEstudio' => 'Estudio citológico de impronta'],
            ['codigo' => 'ES', 'tipoEstudio' => 'Estudio citológico de semen'],
            ['codigo' => 'EX', 'tipoEstudio' => 'Estudio hematológico completo'],
        ];

        foreach ($naturalezas as $naturaleza) {
            Naturaleza::create($naturaleza);
        }

        $formatos = [
            ['nombre' => 'Fresco'],
            ['nombre' => 'Formol'],
            ['nombre' => 'Etanol 70%'],
        ];

        foreach ($formatos as $formato) {
            Formato::create($formato);
        }

        $interpretaciones = [
            ['codigo' => '1.1.', 'texto' => 'Predominio de células epiteliales escamosas superficiales.'],
            ['codigo' => '1.2.', 'texto' => 'Predominio de células epiteliales escamosas intermedias.'],
        ];

        foreach ($interpretaciones as $interpretacion) {
            $idNaturaleza = Naturaleza::inRandomOrder()->first()->id; // Obtiene un id de Naturaleza aleatorio
            Interpretacion::create(array_merge($interpretacion, ['idNaturaleza' => $idNaturaleza]));
        }

        $calidades = [
            ['codigo' => 'H.1.', 'texto' => 'Muestra válida para examen.'],
            ['codigo' => 'H.2.', 'texto' => 'Muestra válida para examen aunque limitada por lipemia.'],
        ];

        foreach ($calidades as $calidad) {
            $idNaturaleza = Naturaleza::inRandomOrder()->first()->id; // Obtiene un id de Naturaleza aleatorio
            Calidad::create(array_merge($calidad, ['idNaturaleza' => $idNaturaleza]));
        }

         User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
