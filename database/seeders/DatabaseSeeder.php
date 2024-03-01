<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Akun;
use App\Models\Rute;
use App\Models\DeliveryOrder;
use App\Models\Kontak;
use App\Models\Mobil;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);

        Akun::create([
            'Nama_Akun' => 'Kas',
            'Kategori' => 'Kas',
            'Tipe_Transaksi' => 'Debit'
        ]);

        Akun::create([
            'Nama_Akun' => 'Kas Kecil',
            'Kategori' => 'Kas',
            'Tipe_Transaksi' => 'Debit'
        ]);

        Kontak::create([
            'Nama_Kontak' => 'General Employee',
            'Nomor_Telepon' => '08123456789',
            'Tipe_Kontak' => 'Karyawan'
        ]);

        Kontak::create([
            'Nama_Kontak' => 'General Customer',
            'Nomor_Telepon' => '08123456789',
            'Tipe_Kontak' => 'Pelanggan'
        ]);

        Kontak::create([
            'Nama_Kontak' => 'General Supplier',
            'Nomor_Telepon' => '08123456789',
            'Tipe_Kontak' => 'Pemasok'
        ]);

        Rute::create([
            'Asal_Rute' => 'MIP',
            'Tujuan_Rute' => 'PORT',
            'Gerbang' => 'Selatan',
            'Kilometer_Rute' => '100',
            'Harga_Rute' => '1000000',
        ]);

        Rute::create([
            'Asal_Rute' => 'MIP',
            'Tujuan_Rute' => 'PORT',
            'Gerbang' => 'Utara',
            'Kilometer_Rute' => '200',
            'Harga_Rute' => '2000000',
        ]);

        Mobil::create([
            'Nomor_Polisi' => 'B 1234 ABC',
            'Nomor_Lambung' => 'ALL-001',
            'Pemilik' => 'PT. General',
            'Nomor_Seri' => '1234567890',
            'Nomor_Rangka' => '1234567890',
            'Nomor_Mesin' => '0987654321',
            'Tanggal_Masuk' => '2021-01-01',
            'Tanggal_Keluar' => '-',
        ]);

        Mobil::create([
            'Nomor_Polisi' => 'B 1235 ABC',
            'Nomor_Lambung' => 'ALL-002',
            'Pemilik' => 'PT. General',
            'Nomor_Seri' => '1234567891',
            'Nomor_Rangka' => '1234567891',
            'Nomor_Mesin' => '0987654322',
            'Tanggal_Masuk' => '2021-01-01',
            'Tanggal_Keluar' => '-',
        ]);

        Mobil::create([
            'Nomor_Polisi' => 'B 1236 ABC',
            'Nomor_Lambung' => 'ALL-003',
            'Pemilik' => 'PT. General',
            'Nomor_Seri' => '1234567892',
            'Nomor_Rangka' => '1234567893',
            'Nomor_Mesin' => '0987654324',
            'Tanggal_Masuk' => '2021-01-01',
            'Tanggal_Keluar' => '-',
        ]);

        DeliveryOrder::create([
            'NO_Do' => 'DO-001',
            'Tanggal_Do' => '2021-01-01',
            'Nomor_Polisi' => 'B 1234 ABC',
            'Nomor_Lambung' => 'ALL-001',
            'SJB_Muat' => 'SJB-001',
            'SJB_Bongkar' => 'SJB-002',
            'Rute' => 1,
            'Tonase' => '80',
            'Status' => 'Selesai',
        ]);

        DeliveryOrder::create([
            'NO_Do' => 'DO-002',
            'Tanggal_Do' => '2021-01-01',
            'Nomor_Polisi' => 'B 1235 ABC',
            'Nomor_Lambung' => 'ALL-002',
            'SJB_Muat' => 'SJB-003',
            'SJB_Bongkar' => 'SJB-004',
            'Rute' => 2,
            'Tonase' => '90',
            'Status' => 'Selesai',
        ]);




    }
}
