<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto')->insert([
            'nombre' => 'Ferrari 488 GTB',
            'precio' => '300000',
            'img' => 'https://hips.hearstapps.com/es.h-cdn.co/cades/contenidos/14167/ferrari488gtb6.jpg',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Ferrari 812 GTS',
            'precio' => '270000',
            'img' => 'https://cdn.ferrari.com/cms/network/media/img/resize/5d70e7d4ee5f7e58630608ed-d-2.0-812gts-dynamic-focuson?',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Porsche 718 Boxster',
            'precio' => '314000',
            'img' => 'https://www.topgear.com/sites/default/files/2021/09/PCGB20_0937_fine.jpg',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Porsche 718 Cayman GT4 RS',
            'precio' => '470000',
            'img' => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/dsc08690-1637086240.jpg',
            'id_categoria' => '1'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz EQE Sedan',
            'precio' => '75000',
            'img' => 'https://www.motortrend.com/uploads/2022/04/2023-Mercedes-Benz-EQE-12.jpg?fit=around%7C875:492',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz EQS SUV',
            'precio' => '105000',
            'img' => 'https://soymotor.com/sites/default/files/imagenes/noticia/mercedes-eqs-suv-3-soymotor.jpg',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q8 e-tron',
            'precio' => '70000',
            'img' => 'https://cdn.motor1.com/images/mgl/W89AEg/s3/audi-q8-e-tron-2023-das-exterieur.jpg',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi SQ8',
            'precio' => '96000',
            'img' => 'https://www.megautos.com/wp-content/uploads/2019/07/Audi-SQ8-delantera.jpg',
            'id_categoria' => '2'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q4 e-tron',
            'precio' => '50000',
            'img' => 'https://autotest.com.ar/wp-content/uploads/2021/04/AUDI-Q4-E-TRON-2022.jpg',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Audi Q5',
            'precio' => '45000',
            'img' => 'https://www.motortrend.com/uploads/2022/07/2023-Audi-Q5-45-front-three-quarter-view.jpg',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz GLA SUV',
            'precio' => '38000',
            'img' => 'https://www.carsmagazine.com.ar/wp-content/uploads/2020/09/nueva-mercedes-benz-gla-16.jpg',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mercedes Benz GLB SUV',
            'precio' => '40000',
            'img' => 'https://www.mbusa.com/content/dam/mb-nafta/us/myco/my23/glb/class-page/series/2023-GLB-SUV-CT-1-5-01-DR.jpg',
            'id_categoria' => '3'
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Silla de bebe',
            'precio' => '300',
            'img' => 'https://www.mbusa.com/content/dam/mb-nafta/us/myco/accessories-api/2021/e53c4/45470.png',
            'id_categoria' => '4'
        ]);
    }
}
