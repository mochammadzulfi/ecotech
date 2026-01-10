<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageHeaderSecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_headers')->where('page', 'services')->update([
            'btn_primary_text_id' => 'Hubungi Kami',
            'btn_primary_text_en' => 'Contact Us',
            'btn_primary_url'     => '/contact',

            'btn_secondary_text_id' => 'Lihat Portfolio',
            'btn_secondary_text_en' => 'View Portfolio',
            'btn_secondary_url'     => '/portfolio',
        ]);
    }
}
