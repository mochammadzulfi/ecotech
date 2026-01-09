<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('home_contents')->insert([
            'hero_title_id' => 'Solusi Boiler Profesional',
            'hero_title_en' => 'Professional Boiler Solution',

            'hero_subtitle_id' =>
            'Efisiensi, keselamatan, dan keandalan untuk memaksimalkan output produksi Anda. 
                 Kami menyediakan layanan rekayasa termodinamika yang komprehensif.',

            'hero_subtitle_en' =>
            'Efficiency, safety and reliability aimed at maximizing your production output. 
                 We provide comprehensive thermodynamic engineering services.',

            // default image (pastikan file ini ada)
            'hero_image' => 'home/hero.jpg',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
