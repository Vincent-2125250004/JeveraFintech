<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Akun;
use App\Models\Kontak;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create ( [
            'name' => 'Admin',
            'email' =>'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin'=> 1,
            'remember_token' => Str::random(10),
        ]);

        Akun::create([
            'Nama_Akun' => 'Kas',
            'Kategori' => 'Kas',
            'Tipe_Transaksi'=> 'Debit'
        ]);

        Akun::create([
            'Nama_Akun' => 'Kas Kecil',
            'Kategori' => 'Kas',
            'Tipe_Transaksi'=> 'Debit'
        ]);

        Kontak::create([
            'Nama_Kontak' => 'General Employee',
            'Nomor_Telepon' => '08123456789',
            'Tipe_Kontak' => 'Karyawan'
        ]);
    }
}
