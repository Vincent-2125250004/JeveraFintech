<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function generatePDFMobil() {
        
        $mobil = Mobil::get();

        $data = [
            'title' => 'Data Mobil CV. Jevera',
            'date' => date('m/d/Y'),
            'image' => public_path('logo/JVRBLUEKOP.png'),
            'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
            'email' => 'cvjevera@gmail.com',
            'mobil' => $mobil
        ];
        
        $pdf = Pdf::loadView('pdf.mobilPDF', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('DataSeluruhMobil.pdf');
    }

    public function generatePDFDeliveryOrder() {
        
    }
}
