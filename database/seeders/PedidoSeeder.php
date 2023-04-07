<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedido')->insert([
            'id_cliente' => '1',
            'fecha_pedido' => '05/03/2023',
            'precio' => '300600'
        ]);

        DB::table('pedido')->insert([
            'id_cliente' => '2',
            'fecha_pedido' => '06/03/2023',
            'precio' => '80000'
        ]);

        DB::table('pedido')->insert([
            'id_cliente' => '2',
            'fecha_pedido' => '06/03/2023',
            'precio' => '784900'
        ]);
    }
}
