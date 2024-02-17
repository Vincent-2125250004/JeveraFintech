<?php

namespace App\Models;

use App\Enums\TipeTransaksiAkun;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{

    use HasFactory;
    protected $fillable = [
        'Nama_Akun',
        'Kategori',
        'Tipe_Transaksi',
    ];

    protected $casts = [
        'Tipe_Transaksi' => TipeTransaksiAkun::class,
    ];

    public function akun() {
        return $this->hasMany(Pengeluaran::class);
    }

}
