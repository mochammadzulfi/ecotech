<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            'map_embed' => '<iframe src="https://www.google.com/maps/embed?..."></iframe>',
            'email' => 'ecotechservicesindonesia@gmail.com',
            'phone' => '+62 811 0001 000',
            'address_id' => 'Penjaringan – Jakarta Utara',
            'address_en' => 'Penjaringan – North Jakarta',
        ]);
    }
}
