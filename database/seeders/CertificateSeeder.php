<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificates')->insert([
            [
                'name' => 'BPJS Ketenagakerjaan',
                'logo' => 'certificates/bpjs.png',
            ],
            [
                'name' => 'BKI',
                'logo' => 'certificates/bki.png',
            ],
            [
                'name' => 'ISO 9001:2015',
                'logo' => 'certificates/iso.png',
            ],
        ]);
    }
}
