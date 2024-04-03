<?php

namespace Database\Seeders;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/banner.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Banner::create([
                    'id'                    => $data[0],
                    'gambar_banner'         => $data[1],
                    'lokasi_banner'         => $data[2],
                    'status'                => $data[3],
                    'created_at'            => Carbon::now(),
                    'updated_at'            => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }

}
