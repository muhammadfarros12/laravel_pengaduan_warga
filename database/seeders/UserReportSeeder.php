<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'User Demo',
            'address' => 'kampung baik',
            'email' => 'user@example.com',
            'whatsapp' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'warga',
        ]);

        $statuses = ['pending', 'proses', 'selesai'];

        // Buat 6 laporan
        for ($i = 0; $i < 6; $i++) {
            Report::create([
                'reporter_id' => $user->id,
                'title' => 'Laporan ' . ($i + 1),
                'detail' => 'Deskripsi laporan ke-' . ($i + 1),
                'time_report' => now()->subDays($i),
                'photo' => 'gambar' . ($i + 1) . '.jpg',
                'status' => $statuses[$i % count($statuses)], // biar status bergantian
            ]);
        }
    }
}
