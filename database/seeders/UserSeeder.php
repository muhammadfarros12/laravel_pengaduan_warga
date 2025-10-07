<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'whatsapp' => '081234567890',
                'password' => Hash::make('1234567890'),
                'photo' => null,
                'address' => 'Jl. Admin No. 1',
                'role' => 'admin'
            ],
            [
                'name' => 'warga',
                'email' => 'warga@gmail.com',
                'whatsapp' => '081234567890',
                'password' => Hash::make('1234567890'),
                'photo' => null,
                'address' => 'Jl. Warga No. 2',
                'role' => 'warga'
            ]
        ];

        foreach ($user as $data) {
            User::create($data);
        }


    }
}
