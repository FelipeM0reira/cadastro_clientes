<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
            ['nome' => 'Belém'],
            ['nome' => 'São Paulo'],
            ['nome' => 'Rio de Janeiro'],
            ['nome' => 'Belo Horizonte'],
            ['nome' => 'Porto Alegre'],
        ]);
    }
}
