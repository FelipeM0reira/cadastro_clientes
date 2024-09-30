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
        DB::table('clientes')->insert([
            ['nome' => 'Felipe Moreira', 'cidade_id' => 1],
            ['nome' => 'João Silva', 'cidade_id' => 2],
            ['nome' => 'Maria Souza', 'cidade_id' => 3],
            ['nome' => 'Ana Clara', 'cidade_id' => 4],
            ['nome' => 'Beatriz', 'cidade_id' => 5],
        ]);
    }
}
