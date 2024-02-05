<?php

namespace App\Models;

use App\Enums\TipeKontak;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'Kode_Kontak',
        'Nama_Kontak',
        'Nomor_Telepon',
        'Tipe_Kontak',
    ];

    protected $casts = [
        'Tipe_Kontak' => TipeKontak::class,
    ];
    protected $primaryKey = 'Kode_Kontak';
}
