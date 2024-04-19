<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            bannerSeeder::class,
            BanksSeeder::class,
            CuciKeringSeeder::class,
            cuciKhususSeeder::class,
            cuciSepatuSeeder::class,
            // gambarKamarSeeder::class,
            fasilitasSeeder::class,
            // kamar_kost_fasilitasSeeder::class,
            UserSeeder::class,
            // kamarKostSeeder::class,
        ]);
    }
}
