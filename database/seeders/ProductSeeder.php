<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([

            /* =======================
       STEAM BOILER
    ======================= */
            [
                'category_id' => 1,
                'slug' => 'water-tube-series-x',
                'name_id' => 'Water Tube Series X',
                'name_en' => 'Water Tube Series X',
                'short_desc_id' => 'High pressure steam boiler untuk industri besar.',
                'short_desc_en' => 'High pressure steam boiler for heavy industries.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/boiler-1.jpg',
                'is_featured' => true,
            ],
            [
                'category_id' => 1,
                'slug' => 'fire-tube-master',
                'name_id' => 'Fire Tube Master',
                'name_en' => 'Fire Tube Master',
                'short_desc_id' => 'Steam boiler efisiensi tinggi untuk pabrik.',
                'short_desc_en' => 'High efficiency steam boiler for factories.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/boiler-2.jpg',
                'is_featured' => false,
            ],
            [
                'category_id' => 1,
                'slug' => 'compact-steam-pro',
                'name_id' => 'Compact Steam Pro',
                'name_en' => 'Compact Steam Pro',
                'short_desc_id' => 'Steam boiler compact untuk ruang terbatas.',
                'short_desc_en' => 'Compact steam boiler for limited spaces.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/boiler-3.jpg',
                'is_featured' => false,
            ],

            /* =======================
       HOT WATER
    ======================= */
            [
                'category_id' => 2,
                'slug' => 'hot-water-hw-300',
                'name_id' => 'Hot Water HW-300',
                'name_en' => 'Hot Water HW-300',
                'short_desc_id' => 'Boiler air panas untuk sistem pemanas industri.',
                'short_desc_en' => 'Hot water boiler for industrial heating systems.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/hotwater-1.jpg',
                'is_featured' => true,
            ],
            [
                'category_id' => 2,
                'slug' => 'hot-water-hw-600',
                'name_id' => 'Hot Water HW-600',
                'name_en' => 'Hot Water HW-600',
                'short_desc_id' => 'Sistem air panas kapasitas menengah.',
                'short_desc_en' => 'Medium capacity hot water system.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/hotwater-2.jpg',
                'is_featured' => false,
            ],

            /* =======================
       THERMAL OIL
    ======================= */
            [
                'category_id' => 3,
                'slug' => 'thermal-oil-to-500',
                'name_id' => 'Thermal Oil TO-500',
                'name_en' => 'Thermal Oil TO-500',
                'short_desc_id' => 'Thermal oil heater suhu tinggi stabil.',
                'short_desc_en' => 'Stable high temperature thermal oil heater.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/thermal-1.jpg',
                'is_featured' => true,
            ],
            [
                'category_id' => 3,
                'slug' => 'thermal-oil-to-800',
                'name_id' => 'Thermal Oil TO-800',
                'name_en' => 'Thermal Oil TO-800',
                'short_desc_id' => 'Thermal oil system untuk proses industri berat.',
                'short_desc_en' => 'Thermal oil system for heavy industrial process.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/thermal-2.jpg',
                'is_featured' => false,
            ],

            /* =======================
       SPARE PARTS
    ======================= */
            [
                'category_id' => 4,
                'slug' => 'heat-exchanger-hx-01',
                'name_id' => 'Heat Exchanger HX-01',
                'name_en' => 'Heat Exchanger HX-01',
                'short_desc_id' => 'Heat exchanger efisiensi tinggi.',
                'short_desc_en' => 'High efficiency heat exchanger.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/part-1.jpg',
                'is_featured' => false,
            ],
            [
                'category_id' => 4,
                'slug' => 'industrial-valve-pro',
                'name_id' => 'Industrial Valve Pro',
                'name_en' => 'Industrial Valve Pro',
                'short_desc_id' => 'Valve industri tahan tekanan tinggi.',
                'short_desc_en' => 'High pressure industrial valve.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/part-2.jpg',
                'is_featured' => false,
            ],
            [
                'category_id' => 4,
                'slug' => 'boiler-instrument-kit',
                'name_id' => 'Boiler Instrument Kit',
                'name_en' => 'Boiler Instrument Kit',
                'short_desc_id' => 'Perlengkapan instrumentasi boiler.',
                'short_desc_en' => 'Complete boiler instrumentation set.',
                'specs' => json_encode([
                    [
                        'label_id' => 'Kapasitas',
                        'label_en' => 'Capacity',
                        'value' => '10–50 Ton/H',
                    ],
                    [
                        'label_id' => 'Tekanan',
                        'label_en' => 'Pressure',
                        'value' => '20 Bar',
                    ],
                ]),
                'image' => 'products/part-3.jpg',
                'is_featured' => false,
            ],

        ]);
    }
}
