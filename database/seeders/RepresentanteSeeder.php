<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('representantes')->insert([
            ['nome' => 'Carlos Lima', 'cidade_id' => 1],
            ['nome' => 'Fernanda Costa', 'cidade_id' => 2],
            ['nome' => 'Pedro Gomes', 'cidade_id' => 3],
            ['nome' => 'Mariana Azevedo', 'cidade_id' => 4],
            ['nome' => 'Ana Carla', 'cidade_id' => 5],
        ]);
    }
}
