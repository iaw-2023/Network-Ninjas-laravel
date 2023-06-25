<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@iaw.com',
            'password' => Hash::make('admin123'),
            'rol' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Ventas',
            'email' => 'ventas@iaw.com',
            'password' => Hash::make('ventas123'),
            'rol' => 'ventas'
        ]);

        DB::table('users')->insert([
            'name' => 'Cargador',
            'email' => 'cargador@iaw.com',
            'password' => Hash::make('cargador123'),
            'rol' => 'cargador'
        ]);
    }
}
