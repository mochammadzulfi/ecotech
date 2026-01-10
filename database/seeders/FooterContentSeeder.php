<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footer_contents')->insert([
            [
                'about_id' =>
                'Solusi boiler industri dengan standar keselamatan dan keandalan tinggi.',

                'about_en' =>
                'Industrial boiler solutions with high safety and reliability standards.',

                'company_name' => 'CV. Ecotech Services Indonesia',

                'email' => 'ecotechservicesindonesia@gmail.com',
                'phone' => '+62 811 0000 000',

                'address_id' =>
                'Pandugo 4 / RT 001 RW 001
             Penjaringan - Rungkut
             Surabaya - Jawa Timur',

                'address_en' =>
                'Pandugo 4 / RT 001 RW 001
             Penjaringan - Rungkut
             Surabaya - East Java',
            ]
        ]);
    }
}
