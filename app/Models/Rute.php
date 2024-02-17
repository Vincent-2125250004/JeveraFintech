<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $fillable = [
        'Asal_Rute',
        'Tujuan_Rute',
    ];

    public function rute() {
        return $this->hasMany(DeliveryOrder::class);
    }



}
