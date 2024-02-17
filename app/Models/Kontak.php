<?php

namespace App\Models;

use App\Enums\TipeKontak;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Kontak',
        'Nomor_Telepon',
        'Tipe_Kontak',
    ];

    protected $casts = [
        'Tipe_Kontak' => TipeKontak::class,
    ];


    public function kontak() {
        return $this->hasMany(Pengeluaran::class);
    }
}
