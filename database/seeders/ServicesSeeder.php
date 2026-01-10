<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'slug' => 'survey-analysis',
                'title_id' => 'Survey & Analisis',
                'title_en' => 'Survey & Analysis',
                'short_desc_id' => 'Survey dan analisis sistem boiler industri.',
                'short_desc_en' => 'Industrial boiler survey and analysis.',
                'content_id' => 'Penjelasan lengkap layanan survey dan analisis boiler...',
                'content_en' => 'Detailed explanation of survey and boiler analysis service...',
                'image' => 'services/survey.jpg',
                'icon' => 'icons/survey.svg',
            ],
            [
                'slug' => 'retubing',
                'title_id' => 'Retubing',
                'title_en' => 'Retubing',
                'short_desc_id' => 'Penggantian pipa boiler profesional.',
                'short_desc_en' => 'Professional boiler retubing service.',
                'content_id' => 'Penjelasan lengkap layanan retubing...',
                'content_en' => 'Detailed explanation of retubing service...',
                'image' => 'services/retubing.jpg',
                'icon' => 'icons/retubing.svg',
            ],
            [
                'slug' => 'insulation',
                'title_id' => 'Insulasi',
                'title_en' => 'Insulation',
                'short_desc_id' => 'Solusi insulasi boiler industri.',
                'short_desc_en' => 'Industrial boiler insulation solution.',
                'content_id' => 'Penjelasan lengkap layanan insulasi...',
                'content_en' => 'Detailed explanation of insulation service...',
                'image' => 'services/insulation.jpg',
                'icon' => 'icons/insulation.svg',
            ],
            [
                'slug' => 'cleaning',
                'title_id' => 'Cleaning',
                'title_en' => 'Cleaning',
                'short_desc_id' => 'Pembersihan boiler dan sistem pendukung.',
                'short_desc_en' => 'Boiler and supporting system cleaning.',
                'content_id' => 'Penjelasan lengkap layanan cleaning...',
                'content_en' => 'Detailed explanation of cleaning service...',
                'image' => 'services/cleaning.jpg',
                'icon' => 'icons/cleaning.svg',
            ],
        ]);
    }
}
