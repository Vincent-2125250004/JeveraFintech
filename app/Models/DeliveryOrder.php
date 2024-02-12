<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'NO_Do',
        'Tanggal_Do',
        'Nomor_Polisi',
        'Nomor_Lambung',
        'SJB_Muat',
        'SJB_Bongkar',
        'ID_Rute',
        'Tonase',
        'Status',
    ];
}
