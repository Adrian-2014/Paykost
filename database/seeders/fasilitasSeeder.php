<?php

namespace Database\Seeders;

use App\Models\fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama'     => 'AC',
                'gambar'   => 'ac.jpeg',
                'tipe'     => 'kamar',
                'deskripsi'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium neque pariatur est autem ullam sunt assumenda nisi sit odio eos!'
            ],
            [
                'nama'     => 'Kipas Angin',
                'gambar'   => 'kipas-angin.jpeg',
                'tipe'     => 'kamar',
                'deskripsi'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium neque pariatur est autem ullam sunt assumenda nisi sit odio eos!'
            ],
            [
                'nama'     => 'Kulkas',
                'gambar'   => 'kulkas.jpeg',
                'tipe'     => 'kamar',
                'deskripsi'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium neque pariatur est autem ullam sunt assumenda nisi sit odio eos!'
            ],
            [
                'nama'     => 'Dispenser',
                'gambar'   => 'dispenser.jpeg',
                'tipe'     => 'kamar',
                'deskripsi'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium neque pariatur est autem ullam sunt assumenda nisi sit odio eos!'
            ],
            [
                'nama'     => 'Wifi',
                'gambar'   => 'wifi.jpeg',
                'tipe'     => 'kamar',
                'deskripsi'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium neque pariatur est autem ullam sunt assumenda nisi sit odio eos!'

            ]

        ];

        foreach ($datas as $value) {

            fasilitas::create([
                'nama'       => $value['nama'],
                'gambar'     => $value['gambar'],
                'tipe'       => $value['tipe'],
                'deskripsi'  => $value['deskripsi'],
            ]);

        }
    }
}
