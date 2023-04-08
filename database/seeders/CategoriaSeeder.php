<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria')->insert([
            'nombre' => 'Compacto Ejecutivo'
        ]);

        DB::table('categoria')->insert([
            'nombre' => 'Ejecutivo'
        ]);

        DB::table('categoria')->insert([
            'nombre' => 'Familiar grande'
        ]);

        DB::table('categoria')->insert([
            'nombre' => 'Accesorio'
        ]);
    }
}
