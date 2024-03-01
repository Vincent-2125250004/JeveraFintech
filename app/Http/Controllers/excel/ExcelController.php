<?php

namespace App\Http\Controllers\excel;

use App\Exports\DeliveryOrderExport;
use App\Exports\MobilExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export_excelDO() {
        return Excel::download(new DeliveryOrderExport, 'Delivery_Order.xlsx');
    }

    public function export_excelMobil() {
        return Excel::download(new MobilExport, 'Mobil.xlsx');
    }
}
