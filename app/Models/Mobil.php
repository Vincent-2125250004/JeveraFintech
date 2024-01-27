<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Mobil',
        'Nomor_Polisi',
        'Nomor_Lambung',
        'Pemilik',
        'Nomor_Seri',
        'Nomor_Rangka',
        'Nomor_Mesin',
        'Tanggal_Masuk',
        'Tanggal_Keluar',
        'Berkas_Pendukung',
    ];

    protected $dates = [
        'Tanggal_Masuk',
        'Tanggal_Keluar',
    ];

    public function getTanggalMasukAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalKeluarAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
