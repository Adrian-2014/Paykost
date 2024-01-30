<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'     => 'Adrian',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role_id'  => 1
            ],
            [
                'name'     => 'Pemilik Kos',
                'email'    => 'pemilik_kos@gmail.com',
                'password' => Hash::make('paykost'),
                'role_id'  => 2
            ],
            [
                'name'     => 'User',
                'email'    => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id'  => 3
            ],
        ];

        foreach ($datas as $value) {
            
            User::create([
                'name'     => $value['name'],
                'email'    => $value['email'],
                'password' => $value['password'],
                'role_id'  => $value['role_id'],
            ]);

        }
    }
}
