<?php

namespace Database\Seeders;

use App\Models\FooterContent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //$this->call(HomeContentSeeder::class);
        //$this->call(StatSeeder::class);
        //$this->call(ClientSeeder::class);
        //$this->call(ExpertisesSeeder::class);

        // $this->call([
        //     PrecisionSectionSeeder::class,
        //     PrecisionItemSeeder::class,
        // ]);

        //$this->call(ProjectSeeder::class);

        //$this->call(CertificateSeeder::class);

        //$this->call(CtaSectionSeeder::class);

        //$this->call(FooterContentSeeder::class);

        //$this->call(PageHeaderSeeder::class);

        //$this->call(ServicesSeeder::class);

        //$this->call(PageHeaderSecSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
