<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;

class DashboardGraphController extends Controller
{
    public function indexGraph()
    {

        $today = Carbon::now()->format('Y-m-d');

        $pemasukanToday = Pemasukan::whereDate('Tanggal_Pemasukan', $today)->get();
        $pengeluaranToday = Pengeluaran::whereDate('Tanggal_Pengeluaran', $today)->get();
        $totalPemasukanToday = $pemasukanToday->sum('Nominal_Pemasukan');
        $totalPengeluaranToday = $pengeluaranToday->sum('Nominal_Pengeluaran');

        $pengeluaran = Pengeluaran::all();
        $pemasukan = Pemasukan::all();
        $saldo = Saldo::latest()->first();

        return view('dashboard', compact('pengeluaran', 'pemasukan', 'totalPemasukanToday', 'totalPengeluaranToday', 'saldo'));
    }
}
