<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title_id' => 'Proyek A',
                'title_en' => 'Project A',

                'category_id' => 'Perawatan Boiler',
                'category_en' => 'Boiler Maintenance',

                'location_id' => 'Bandung, Indonesia',
                'location_en' => 'Bandung, Indonesia',

                'image' => 'projects/project-1.jpg',
            ],
            [
                'title_id' => 'Proyek B',
                'title_en' => 'Project B',

                'category_id' => 'Instalasi Sistem',
                'category_en' => 'System Installation',

                'location_id' => 'Surabaya, Indonesia',
                'location_en' => 'Surabaya, Indonesia',

                'image' => 'projects/project-2.jpg',
            ],
            [
                'title_id' => 'Proyek C',
                'title_en' => 'Project C',

                'category_id' => 'Retubing Boiler',
                'category_en' => 'Boiler Retubing',

                'location_id' => 'Bekasi, Indonesia',
                'location_en' => 'Bekasi, Indonesia',

                'image' => 'projects/project-3.jpg',
            ],
            [
                'title_id' => 'Proyek D',
                'title_en' => 'Project D',

                'category_id' => 'Penyediaan Suku Cadang',
                'category_en' => 'Spare Parts Supply',

                'location_id' => 'Karawang, Indonesia',
                'location_en' => 'Karawang, Indonesia',

                'image' => 'projects/project-4.jpg',
            ],
        ]);
    }
}
