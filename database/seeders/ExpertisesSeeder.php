<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertisesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('expertises')->insert([
            [
                'icon' => 'icons/repair.svg',
                'title_id' => 'Perawatan & Perbaikan',
                'title_en' => 'Maintenance & Repair',
                'desc_id' => 'Layanan perawatan dan perbaikan boiler industri.',
                'desc_en' => 'Industrial boiler maintenance and repair services.',
            ],
            [
                'icon' => 'icons/install.svg',
                'title_id' => 'Instalasi Sistem',
                'title_en' => 'System Installation',
                'desc_id' => 'Instalasi sistem boiler dan pendukung.',
                'desc_en' => 'Complete boiler system installation.',
            ],
            [
                'icon' => 'icons/sparepart.svg',
                'title_id' => 'Suku Cadang',
                'title_en' => 'Spare Parts Supply',
                'desc_id' => 'Penyediaan suku cadang boiler.',
                'desc_en' => 'Boiler spare parts supply.',
            ],
        ]);
    }
}
