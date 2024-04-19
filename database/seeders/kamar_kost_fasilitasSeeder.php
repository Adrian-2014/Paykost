<?php

namespace Database\Seeders;

use App\Models\fasilitas;
use App\Models\KamarKostFasilitas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kamar_kost_fasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/kamar_kost_fasilitas.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                KamarKostFasilitas::create([
                    'id'                   => $data[0],
                    'kamar_kost_id'         => $data[1],
                    'fasilitas_id'          => $data[2],
                    'created_at'           => Carbon::now(),
                    'updated_at'           => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
