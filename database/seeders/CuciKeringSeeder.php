<?php

namespace Database\Seeders;

use App\Models\Cuci;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuciKeringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile   = fopen(base_path("/database/seeders/csvs/cuci.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Cuci::create([
                    'id'                    => $data[0],
                    'nama_barang'           => $data[1],
                    'harga_barang'          => $data[2],
                    'gambar_barang'         => $data[3],
                    'jenis_layanan'         => $data[4],
                    'created_at'            => Carbon::now(),
                    'updated_at'            => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
