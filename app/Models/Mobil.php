<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berkas_Pendukung;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function berkas()  {
        return $this->hasMany(BerkasPendukung::class,'ID_Mobil');
    }

    public function mobil() {
        return $this->hasMany(DeliveryOrder::class);
    }


}
