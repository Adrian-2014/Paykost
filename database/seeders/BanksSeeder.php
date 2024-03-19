<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Banks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = [
            [
                'nama'=>'Bank BCA',
                'slug'=>'bca',
                'gambar'=>'bca.png'
            ],
            [
                'nama'=>'Bank BNI',
                'slug'=>'bni',
                'gambar'=>'bni.png'
            ],
            [
                'nama'=>'Bank Mandiri',
                'slug'=>'mandiri',
                'gambar'=>'mandiri.png'
            ],
            [
                'nama'=>'Bank BRI',
                'slug'=>'bri',
                'gambar'=>'bri.png'
            ],
            [
                'nama'=>'Bank Jatim',
                'slug'=>'jatim',
                'gambar'=>'jatim.jpeg'
            ],
            [
                'nama'=>'Bank BTN',
                'slug'=>'btn',
                'gambar'=>'btn.png'
            ],
        ];

        Bank::insert($datas);
    }
}
