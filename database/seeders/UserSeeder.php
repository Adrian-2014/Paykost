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
                'no_kamar' => null,
                'no_telpon' => null,
                'status' => null,
                'role_id'  => 1
            ]
        ];

        foreach ($datas as $value) {

            User::create([
                'name'     => $value['name'],
                'email'    => $value['email'],
                'password' => $value['password'],
                'role_id'  => $value['role_id'],
                'no_kamar'  => $value['no_kamar'],
                'no_telpon'  => $value['no_telpon'],
                'status'  => $value['status'],
            ]);

        }
    }
}
