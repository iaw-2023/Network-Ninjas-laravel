<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallesPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detalles_pedido')->insert([
            'precio_total' => '300000',
            'cantidad' => '1',
            'id_pedido' => '1',
            'id_producto' => '1'
        ]);

        DB::table('detalles_pedido')->insert([
            'precio_total' => '600',
            'cantidad' => '2',
            'id_pedido' => '1',
            'id_producto' => '13'
        ]);

        DB::table('detalles_pedido')->insert([
            'precio_total' => '80000',
            'cantidad' => '2',
            'id_pedido' => '2',
            'id_producto' => '12'
        ]);

        DB::table('detalles_pedido')->insert([
            'precio_total' => '314000',
            'cantidad' => '1',
            'id_pedido' => '3',
            'id_producto' => '3'
        ]);

        DB::table('detalles_pedido')->insert([
            'precio_total' => '900',
            'cantidad' => '3',
            'id_pedido' => '3',
            'id_producto' => '13'
        ]);

        DB::table('detalles_pedido')->insert([
            'precio_total' => '470000',
            'cantidad' => '1',
            'id_pedido' => '3',
            'id_producto' => '4'
        ]);
    }
}
