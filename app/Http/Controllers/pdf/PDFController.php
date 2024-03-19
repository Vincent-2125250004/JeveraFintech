<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\Adjetiva;


class PDFController extends Controller
{
    public function generatePDFMobil()
    {

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

    public function generatePDFDeliveryOrder(Request $request)
    {
        $tonase_rute = $request->tonase_rute;
        $harga_jumlah = $request->harga_jumlah;
        $harga_jumlah_uangjalan = $request->harga_jumlah_uangjalan;
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        if ($tonase_rute == '1') {
            $do = DeliveryOrder::get();
            $data = [
                'title' => 'Data Delivery Order CV.Jevera',
                'date' => date('Y-m-d'),
                'image' => public_path('logo/JVRBLUEKOP.png'),
                'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
                'email' => 'cvjevera@gmail.com',
                'do' => $do
            ];

            $pdf = Pdf::loadView('pdf.doTonasePDF', $data);
            $pdf->setPaper('a4', 'landscape');

        } else if ($start_date != null && $end_date != null && $harga_jumlah == '2') {
            $do = DeliveryOrder::whereDate('Tanggal_Do', '>=', $start_date)->whereDate('Tanggal_Do', '<=', $end_date)->get();
            $data = [
                'title' => 'Data Delivery Order CV.Jevera',
                'date' => date('Y-m-d'),
                'image' => public_path('logo/JVRBLUEKOP.png'),
                'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
                'email' => 'cvjevera@gmail.com',
                'do' => $do
            ];

            $pdf = Pdf::loadView('pdf.doHargaJumlahPDF', $data);
            $pdf->setPaper('a4', 'landscape');

        } else if ($start_date != null && $end_date != null && $harga_jumlah_uangjalan == '3') {
            $do = DeliveryOrder::whereDate('Tanggal_Do', '>=', $start_date)->whereDate('Tanggal_Do', '<=', $end_date)->get();
            $data = [
                'title' => 'Data Delivery Order CV.Jevera',
                'date' => date('Y-m-d'),
                'image' => public_path('logo/JVRBLUEKOP.png'),
                'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
                'email' => 'cvjevera@gmail.com',
                'do' => $do
            ];

            $pdf = Pdf::loadView('pdf.doHargaJumlahUangJalanPDF', $data);
            $pdf->setPaper('a4', 'landscape');

        }
        return $pdf->stream('DataSeluruhDeliveryOrder.pdf');
    }

    public function generatePDFJournalVoucherPengeluaran($id)
    {

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

    public function generatePDFJournalVoucherPemasukan($id)
    {

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

    public function generatePDFJournalVoucherAdjetiva($id)
    {
        $adjetiva = Adjetiva::find($id);

        $data = [
            'title' => 'Journal Voucher CV. Jevera',
            'date' => date('Y-m-d'),
            'image' => public_path('logo/JVRBLUEKOP.png'),
            'alamat' => 'Jl. Rawa Jaya RT 012, RW 004, Kelurahan Pahlawan, Kecamatan Kemuning, Kota Palembang, Sumatera Selatan, Indonesia',
            'email' => 'cvjevera@gmail.com',
            'adjetiva' => $adjetiva
        ];
        $pdf = Pdf::loadView('pdf.journalVoucherAdjetivaPDF', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('JournalVoucherAdjetiva.pdf');
    }

}
