<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedido')->insert([
            'fecha_pedido' => '2023-05-03',
            'precio' => '300600',
            'id_cliente' => '1'
        ]);

        DB::table('pedido')->insert([
            'fecha_pedido' => '2023-06-03',
            'precio' => '80000',
            'id_cliente' => '2'
        ]);

        DB::table('pedido')->insert([
            'fecha_pedido' => '2023-06-03',
            'precio' => '784900',
            'id_cliente' => '2'
        ]);
    }
}
