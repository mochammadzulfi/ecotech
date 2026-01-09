<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stats')->insert([
            [
                'icon' => 'icons/support.svg',
                'value' => '24/7',
                'label_id' => 'Dukungan Teknis',
                'label_en' => 'Technical Support',
            ],
            [
                'icon' => 'icons/project.svg',
                'value' => '500+',
                'label_id' => 'Proyek Selesai',
                'label_en' => 'Project Completed',
            ],
            [
                'icon' => 'icons/experience.svg',
                'value' => '10+',
                'label_id' => 'Tahun Pengalaman',
                'label_en' => 'Years Experience',
            ],
        ]);
    }
}
