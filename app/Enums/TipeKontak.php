<?php

namespace App\Enums;


enum TipeKontak: string
{
    case Pelanggan = 'Pelanggan';
    case Pemasok = 'Pemasok';
    case Karyawan = 'Karyawan';
}