<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'slug' => 'steam-boiler',
                'name_id' => 'Steam Boiler',
                'name_en' => 'Steam Boiler',
            ],
            [
                'slug' => 'hot-water',
                'name_id' => 'Hot Water',
                'name_en' => 'Hot Water',
            ],
            [
                'slug' => 'thermal-oil',
                'name_id' => 'Thermal Oil',
                'name_en' => 'Thermal Oil',
            ],
            [
                'slug' => 'parts',
                'name_id' => 'Spare Parts',
                'name_en' => 'Spare Parts',
            ],
        ]);
    }
}
