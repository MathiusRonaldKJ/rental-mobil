<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed users
        User::create([
            'name' => 'Admin Rental',
            'email' => 'admin@rental.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Biasa 1',
            'email' => 'user1@rental.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'User Biasa 2',
            'email' => 'user2@rental.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Seed kendaraan
        $kendaraans = [
            [
                'jenis_kendaraan' => 'penumpang',
                'nama_kendaraan' => 'Toyota Avanza',
                'deskripsi' => 'Mobil keluarga 7 seater, cocok untuk liburan',
                'kapasitas' => 7,
                'satuan_kapasitas' => 'orang',
                'harga_sewa' => 350000,
                'status' => true,
                'gambar' => 'avanza.jpg',
            ],
            [
                'jenis_kendaraan' => 'penumpang',
                'nama_kendaraan' => 'Honda Brio',
                'deskripsi' => 'Mobil city car 5 seater, hemat bahan bakar',
                'kapasitas' => 5,
                'satuan_kapasitas' => 'orang',
                'harga_sewa' => 250000,
                'status' => true,
                'gambar' => 'brio.jpg',
            ],
            [
                'jenis_kendaraan' => 'barang',
                'nama_kendaraan' => 'Mitsubishi L300',
                'deskripsi' => 'Truk pick-up kapasitas 1 ton, untuk angkutan barang',
                'kapasitas' => 1,
                'satuan_kapasitas' => 'ton',
                'harga_sewa' => 450000,
                'status' => true,
                'gambar' => 'l300.jpg',
            ],
            [
                'jenis_kendaraan' => 'barang',
                'nama_kendaraan' => 'Toyota Hiace',
                'deskripsi' => 'Mobil barang 12 seat atau untuk cargo',
                'kapasitas' => 12,
                'satuan_kapasitas' => 'orang',
                'harga_sewa' => 550000,
                'status' => true,
                'gambar' => 'hiace.jpg',
            ],
            [
                'jenis_kendaraan' => 'penumpang',
                'nama_kendaraan' => 'Suzuki Ertiga',
                'deskripsi' => 'MPV 7 seater dengan fitur lengkap',
                'kapasitas' => 7,
                'satuan_kapasitas' => 'orang',
                'harga_sewa' => 400000,
                'status' => true,
                'gambar' => 'ertiga.jpg',
            ],
            [
                'jenis_kendaraan' => 'barang',
                'nama_kendaraan' => 'Isuzu Elf',
                'deskripsi' => 'Truk medium 3 ton untuk pengiriman barang',
                'kapasitas' => 3,
                'satuan_kapasitas' => 'ton',
                'harga_sewa' => 800000,
                'status' => true,
                'gambar' => 'elf.jpg',
            ],
        ];

        foreach ($kendaraans as $kendaraan) {
            Kendaraan::create($kendaraan);
        }

        // Seed pemesanan
        for ($i = 1; $i <= 5; $i++) {
            Pemesanan::create([
                'user_id' => 2, // User biasa 1
                'kendaraan_id' => rand(1, 6),
                'tanggal_mulai' => now()->addDays($i),
                'tanggal_selesai' => now()->addDays($i + 3),
                'durasi' => 3,
                'total_harga' => rand(1000000, 3000000),
                'status' => ['pending', 'diproses', 'disetujui'][rand(0, 2)],
                'catatan' => 'Pemesanan contoh ke-' . $i,
            ]);
        }
    }
}