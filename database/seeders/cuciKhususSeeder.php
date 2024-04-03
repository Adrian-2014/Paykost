<?php

namespace Database\Seeders;


use App\Models\cucisize;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cuciKhususSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvFile   = fopen(base_path("/database/seeders/csvs/cucisize.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                cucisize::create([
                    'id'                    => $data[0],
                    'nama_barang'           => $data[1],
                    'harga_barang'          => $data[2],
                    'gambar_barang'         => $data[3],
                    'status'                => $data[4],
                    'jenis_layanan'         => $data[5],
                    'ukuran_barang'         => $data[6],
                    'created_at'            => Carbon::now(),
                    'updated_at'            => Carbon::now()
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }

}
