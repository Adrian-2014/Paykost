<?php

namespace Database\Seeders;

use App\Models\kamarKost;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kamarKostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/kamar_kost.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                kamarKost::create([
                    'id'                   => $data[0],
                    'user_id'              => $data[1],
                    'nomor_kamar'          => $data[2],
                    'ukuran_kamar'         => $data[3],
                    'harga_kamar'          => $data[4],
                    'kondisi'              => $data[5],
                    'status'               => $data[6],
                    'created_at'           => Carbon::now(),
                    'updated_at'           => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}