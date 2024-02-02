<?php

namespace App\Enums;


enum TipeTransaksiAkun: string
{
    case Debit = 'Debit';
    case Kredit = 'Kredit';
}