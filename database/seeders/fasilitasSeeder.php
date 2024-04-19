<?php

namespace Database\Seeders;

use App\Models\fasilitas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/fasilitas.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                fasilitas::create([
                    'id'                   => $data[0],
                    'nama'                 => $data[1],
                    'gambar'               => $data[2],
                    'tipe'                 => $data[3],
                    'deskripsi'            => $data[4],
                    'created_at'           => Carbon::now(),
                    'updated_at'           => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
