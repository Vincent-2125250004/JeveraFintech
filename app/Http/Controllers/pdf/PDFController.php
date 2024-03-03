<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;


class PDFController extends Controller
{
    public function generatePDFMobil() {
        
        $mobil = Mobil::get();

        $data = [
            'title' => 'Data Mobil CV. Jevera',
            'date' => date('Y-m-d'),
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
        $do = DeliveryOrder::get();

        $data = [
            'title' => 'Data Delivery Order CV. Jevera',
            'date' => date('Y-m-d'),
            'image' => public_path('logo/JVRBLUEKOP.png'),
            'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
            'email' => 'cvjevera@gmail.com',
            'do' => $do
        ];

        $pdf = Pdf::loadView('pdf.deliveryOrderPDF', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('DataSeluruhDeliveryOrder.pdf');
    }

    public function generatePDFJournalVoucherPengeluaran($id) {

        $pengeluaran = Pengeluaran::find($id);
        
        $data = [
            'title' => 'Journal Voucher CV. Jevera',
            'date' => date('Y-m-d'),
            'image' => public_path('logo/JVRBLUEKOP.png'),
            'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
            'email' => 'cvjevera@gmail.com',
            'pengeluaran' => $pengeluaran
        ];

        $pdf = Pdf::loadView('pdf.journalVoucherPengeluaranPDF', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('JournalVoucherPengeluaran.pdf');
    }

    public function generatePDFJournalVoucherPemasukan($id) {

        $pemasukan = Pemasukan::find($id);
        
        $data = [
            'title' => 'Journal Voucher CV. Jevera',
            'date' => date('Y-m-d'),
            'image' => public_path('logo/JVRBLUEKOP.png'),
            'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
            'email' => 'cvjevera@gmail.com',
            'pemasukan' => $pemasukan
        ];

        $pdf = Pdf::loadView('pdf.journalVoucherPemasukanPDF', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('JournalVoucherPemasukan.pdf');
    }

}
