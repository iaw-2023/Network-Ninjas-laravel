<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cliente')->insert([
            'nombre' => 'Sofia',
            'email' => 'sofia@sofia.com'
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Matias',
            'email' => 'matias@matias.com'
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Camila',
            'email' => 'camila@camila.com'
        ]);
    }
}
