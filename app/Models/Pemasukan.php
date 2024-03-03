<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nomor_Referensi',
        'Nama_Kontak',
        'Dari_Akun',
        'Ke_Akun',
        'Nominal_Pemasukan',
        'Tanggal_Pemasukan',
        'Deskripsi'
    ];

    public function saldo()
    {
        return $this->hasOne(Saldo::class, 'Nomor_Referensi', 'Nomor_Referensi');
    }
    public function DariAkun() {
        return $this->belongsTo(Akun::class, 'Dari_Akun');
    }

    public function KeAkun() {
        return $this->belongsTo(Akun::class, 'Ke_Akun');
    }
}
