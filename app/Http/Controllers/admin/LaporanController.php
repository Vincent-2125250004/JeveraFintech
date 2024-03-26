<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Adjetiva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $akun = Akun::all();
        $value = Pemasukan::all();
        $valuePengeluaran = Pengeluaran::all();
        $valueAdjetiva = Adjetiva::all();
        
        return view('frontend.laporan.bukubesar.index', compact('akun', 'value', 'valuePengeluaran', 'valueAdjetiva'));
    }

    public function Export(Request $request) {
        $pilih_akun = $request->pilih_akun;
        $semua_akun = $request->semua_akun;
        $selected_akun = $request->selected_akun;

        if ($pilih_akun == '1') {
            $akun = Akun::where('id', $selected_akun)->get();
            $filename = 'Laporan Bukubesar ' . $akun[0]->Nama_Akun . ' ' . Carbon::now()->format('d-m-Y') . '.xls';
        } else if ($semua_akun == '2') {
            $akun = Akun::all();
            $filename = 'Laporan Bukubesar Semua Akun ' . Carbon::now()->format('d-m-Y') . '.xls';
        }

        return view('frontend.laporan.bukubesar.export', compact('akun', 'filename'));
    }

}
