<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'pemilik-kos'
            ],
            [
                'name' => 'user'
            ],
        ];

        foreach ($items as $item) {
            
            Role::create([
                'name' => $item['name'],
            ]);

        }
    }
}
