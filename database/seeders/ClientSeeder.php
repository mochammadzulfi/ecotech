<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            ['name' => 'Garudafood', 'logo' => 'clients/garudafood.png'],
            ['name' => 'Meratus', 'logo' => 'clients/meratus.png'],
            ['name' => 'Temas', 'logo' => 'clients/temas.png'],
            ['name' => 'Tanto', 'logo' => 'clients/tanto.png'],
        ]);
    }
}
