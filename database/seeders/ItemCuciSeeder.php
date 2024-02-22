<?php

namespace Database\Seeders;

use App\Models\CuciItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCuciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'itemName' => 'Nama Barang 1',
                'itemHarga' => '10000',
                'itemImage' => '/public/gambar-kategori/hoodie.png',
            ],
            [
                'itemName' => 'Nama Barang 2',
                'itemHarga' => '20000',
                'itemImage' => '/public/gambar-kategori/kemeja.png',
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        // Loop melalui data dan simpan ke dalam database menggunakan model
        foreach ($items as $item) {
            CuciItem::create($item);
        }
    }
}
