<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto')->insert([
            'nombre' => 'Ferrari 488 GTB',
            'precio ' => '300000',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Ferrari 812 GTS',
            'precio ' => '270000',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Porsche 718 Boxster',
            'precio ' => '314000',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Porsche 718 Cayman GT4 RS',
            'precio ' => '470000',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz EQE Sedan',
            'precio ' => '75000',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz EQS SUV',
            'precio ' => '105000',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q8 e-tron',
            'precio ' => '70000',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi SQ8',
            'precio ' => '96000',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q4 e-tron',
            'precio ' => '50000',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q5',
            'precio ' => '45000',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz GLA SUV',
            'precio ' => '38000',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz GLB SUV',
            'precio ' => '40000',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Silla de bebe',
            'precio ' => '300',
            'id_categoria' => '4'
        ]);
    }
}
