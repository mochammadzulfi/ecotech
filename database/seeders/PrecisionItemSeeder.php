<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecisionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('precision_items')->insert([
            [
                'precision_section_id' => 1,
                'label_id' => 'Survey & Analisis',
                'label_en' => 'Survey & Analysis',
            ],
            [
                'precision_section_id' => 1,
                'label_id' => 'Retubing',
                'label_en' => 'Retubing',
            ],
            [
                'precision_section_id' => 1,
                'label_id' => 'Insulasi',
                'label_en' => 'Insulation',
            ],
            [
                'precision_section_id' => 1,
                'label_id' => 'Pembersihan',
                'label_en' => 'Cleaning',
            ],
        ]);
    }
}
