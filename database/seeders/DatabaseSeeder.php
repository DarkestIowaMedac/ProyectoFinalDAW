<?php

namespace Database\Seeders;

use App\Models\Formato;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Naturaleza;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Crea las 15 sedes reales, las 10 naturalezas reales y 10 usuarios
     * aleatorios de prueba. Crea también los 3 formatos de muestra.
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

        $naturalezas = [
            ['codigo' => 'B', 'nombre' => 'Biopsia'],
            ['codigo' => 'BV', 'nombre' => 'Biopsia veterinaria'],
            ['codigo' => 'CB', 'nombre' => 'Cavidad bucal'],
            ['codigo' => 'CV', 'nombre' => 'Citología vaginal'],
            ['codigo' => 'EX', 'nombre' => 'Extensión sanguínea'],
            ['codigo' => 'O', 'nombre' => 'Orinas'],
            ['codigo' => 'E', 'nombre' => 'Esputos'],
            ['codigo' => 'ES', 'nombre' => 'Semen'],
            ['codigo' => 'I', 'nombre' => 'Improntas'],
            ['codigo' => 'F', 'nombre' => 'Frotis'],
        ];

        $formatos = [
            ['nombre' => 'Fresco'],
            ['nombre' => 'Formol'],
            ['nombre' => 'Etanol 70%'],
        ];

        foreach ($sedes as $sede) {
            Sede::create($sede);
        }

        foreach ($naturalezas as $naturaleza) {
            Naturaleza::create($naturaleza);
        }

        foreach ($formatos as $formato) {
            Formato::create($formato);
        }

         User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
