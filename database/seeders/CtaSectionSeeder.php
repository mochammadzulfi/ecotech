<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CtaSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cta_sections')->insert([
            [
                'title_id' => 'Siap Mengoptimalkan Sistem Anda?',
                'title_en' => 'Ready to Optimize Your System?',

                'desc_id' =>
                'Hubungi tim kami untuk konsultasi gratis. Kami tersedia 24/7 untuk dukungan darurat.',
                'desc_en' =>
                'Contact our team for a free consultation. We are available 24/7 for emergency support.',

                'btn_primary_id' => 'Hubungi Sekarang',
                'btn_primary_en' => 'Call us now',

                'btn_secondary_id' => 'Layanan Kami',
                'btn_secondary_en' => 'Our Services',
            ]
        ]);
    }
}
