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

    public function Export() {
        $akun = Akun::all();

        return view('frontend.laporan.bukubesar.export', compact('akun'));
    }

}
