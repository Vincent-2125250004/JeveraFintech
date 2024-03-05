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
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $search = $request->search;
        $akun = Akun::all();
            foreach ($akun as $akuns) {
                $pemasukan = Pemasukan::where('Dari_Akun', $akuns->id)
                    ->orWhere('Ke_Akun', $akuns->id)
                    ->where('Tanggal_Pemasukan', '>=', $start_date)
                    ->where('Tanggal_Pemasukan', '<=', $end_date)
                    ->orderBy('Tanggal_Pemasukan') // Add orderBy clause
                    ->get();
                $pengeluaran = Pengeluaran::where('Dari_Akun', $akuns->id)
                    ->orWhere('Ke_Akun', $akuns->id)
                    ->whereDate('Tanggal_Pengeluaran', '>=', $start_date)
                    ->whereDate('Tanggal_Pengeluaran', '<=', $end_date)
                    ->orderBy('Tanggal_Pengeluaran') // Add orderBy clause
                    ->get();
                $adjetiva = Adjetiva::where('Dari_Akun', $akuns->id)
                    ->orWhere('Ke_Akun', $akuns->id)
                    ->whereDate('Tanggal_Adjetiva', '>=', $start_date)
                    ->whereDate('Tanggal_Adjetiva', '<=', $end_date)
                    ->orderBy('Tanggal_Adjetiva') // Add orderBy clause
                    ->get();
            }
        $value = $pemasukan;
        $valuePengeluaran = $pengeluaran;
        $valueAdjetiva = $adjetiva;
        
        return view('frontend.laporan.bukubesar.index', compact('akun', 'value', 'valuePengeluaran', 'valueAdjetiva'));
        
    }

}
