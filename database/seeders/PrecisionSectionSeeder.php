<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecisionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('precision_sections')->insert([
            'title_id' => 'Presisi Teknis & Keunggulan Rekayasa',
            'title_en' => 'Technical Precision & Engineering Excellence',

            'desc_id' => 'Kami menghadirkan presisi teknis dan keunggulan rekayasa untuk memastikan
         kinerja sistem boiler yang optimal dan berkelanjutan.',

            'desc_en' => 'We deliver technical precision and engineering excellence to ensure
         optimal and sustainable boiler system performance.',

            'image' => 'precision/boiler.jpg',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
