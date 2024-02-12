<?php

namespace App\Enums;

enum StatusDO: string
{
    case DalamPengiriman = 'Dalam Pengiriman';
    case Selesai = 'Selesai';
    case Dibatalkan = 'Dibatalkan';
}

