<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_headers')->insert([
            [
                'page' => 'services',
                'title_id' => 'Layanan Kami',
                'title_en' => 'Our Services',
                'subtitle_id' => 'Solusi teknis boiler industri yang handal',
                'subtitle_en' => 'Reliable industrial boiler technical solutions',
                'background_image' => 'headers/services.jpg',
            ],
            [
                'page' => 'products',
                'title_id' => 'Produk Kami',
                'title_en' => 'Our Products',
                'subtitle_id' => 'Solusi teknis boiler industri yang handal',
                'subtitle_en' => 'Reliable industrial boiler technical solutions',
                'background_image' => 'headers/products.jpg',
            ],
            [
                'page' => 'portfolio',
                'title_id' => 'Portofolio Kami',
                'title_en' => 'Our Portfolio',
                'subtitle_id' => 'Solusi teknis boiler industri yang handal',
                'subtitle_en' => 'Reliable industrial boiler technical solutions',
                'background_image' => 'headers/portfolio.jpg',
            ],
            [
                'page' => 'contact',
                'title_id' => 'Kontak Kami',
                'title_en' => 'Contact Us',
                'subtitle_id' => 'Hubungi kami untuk informasi lebih lanjut',
                'subtitle_en' => 'Contact us for more information',
                'background_image' => 'headers/contact.jpg',
            ],
        ]);
    }
}
