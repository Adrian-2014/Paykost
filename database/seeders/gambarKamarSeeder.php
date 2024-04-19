<?php

namespace Database\Seeders;

use App\Models\gambarKamar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class gambarKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/gambar_kamar.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                gambarKamar::create([
                    'id'                   => $data[0],
                    'gambar'               => $data[1],
                    'kamar_kost_id'        => $data[2],
                    'created_at'           => Carbon::now(),
                    'updated_at'           => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
