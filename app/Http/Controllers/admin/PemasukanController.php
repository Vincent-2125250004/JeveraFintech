<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\DataPemasukanRequest;
use App\Models\Pemasukan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Akun;
use App\Models\Saldo;
use Carbon\Carbon;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('frontend.pencatatan.pemasukan.index', compact('pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.pemasukan.create', compact('kontak', 'akun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataPemasukanRequest $request)
    {
        $saldo = Saldo::latest()->first();

        $newSaldo = $saldo ? $saldo->Sisa_Saldo : 0;

        $newSaldo += $request->nominal_pemasukan;

        $lastPemasukan = Pemasukan::latest()->first();
        $lastReferenceNumber = $lastPemasukan ? $lastPemasukan->Nomor_Referensi : 'UM-000';

        $referenceNumber = 'UM-' . str_pad((intval(substr($lastReferenceNumber, 3)) + 1), 3, '0', STR_PAD_LEFT);
        
        $pemasukan = Pemasukan::create([
            'Nomor_Referensi' => $referenceNumber,
            'Nama_Kontak' => $request->nama_kontak,
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Nominal_Pemasukan' => $request->nominal_pemasukan,
            'Tanggal_Pemasukan' => Carbon::parse($request->tanggal_pemasukan)->format('Y-m-d'),
            'Deskripsi' => $request->deskripsi
        ]);

        Saldo::create([
            'pengeluaran_id' => null,
            'pemasukan_id' => $pemasukan->id,
            'Transaksi' => 'Pemasukan',
            'Nomor_Referensi' => $referenceNumber,
            'Sisa_Saldo' => $newSaldo
        ]);

        return redirect()->route('pencatatan.pemasukan.index')->with('success', 'Data Pemasukan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.pemasukan.edit', compact('pemasukan', 'kontak', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataPemasukanRequest $request, Pemasukan $pemasukan)
    {
        $saldo = Saldo::latest()->first();

        $originalNominal = $pemasukan->Nominal_Pemasukan;
        $updatedNominal = $request->nominal_pemasukan;

        $nominalDifference = $updatedNominal - $originalNominal;

        $newSisaSaldo = $saldo ? $saldo->Sisa_Saldo : 0;
        $newSisaSaldo += $nominalDifference;

        $pemasukan->update([
            // 'Nomor_Referensi' => $request->nomor_referensi,
            'Nama_Kontak' => $request->nama_kontak,
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Nominal_Pemasukan' => $updatedNominal,
            'Tanggal_Pemasukan' => Carbon::parse($request->tanggal_pemasukan)->format('Y-m-d'),
            'Deskripsi' => $request->deskripsi
        ]);

        $saldo = $pemasukan->saldo;
        if ($saldo) {
            $saldo->update([
                'Sisa_Saldo' => $newSisaSaldo
            ]);
        } else {
            $pemasukan->saldo()->create([
                'Transaksi' => 'Pemasukan', 
                'Nomor_Referensi' => $request->nomor_referensi,
                'Sisa_Saldo' => $newSisaSaldo
            ]);
        }

        return redirect()->route('pencatatan.pemasukan.index')->with('success', 'Data Pemasukan Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan)
    {
        if ($pemasukan->saldo) {
            $pemasukan->saldo->delete();
        }
        $pemasukan->delete();
        return redirect()->route('pencatatan.pemasukan.index')->with('danger', 'Data Pengeluaran Berhasil dihapus');

    }
}
