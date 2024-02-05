<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Rute',
        'Asal_Rute',
        'Tujuan_Rute',
    ];

    protected $primaryKey = 'ID_Rute';


}
