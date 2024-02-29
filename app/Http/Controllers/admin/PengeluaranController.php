<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\DataPengeluaranRequest;
use App\Models\Akun;
use App\Models\Kontak;
use App\Models\Pengeluaran;
use App\Http\Controllers\Controller;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('frontend.pencatatan.pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.pengeluaran.create', compact('kontak', 'akun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataPengeluaranRequest $request)
    {
        $saldo = Saldo::latest()->first();

        $newSaldo = $saldo ? $saldo->Sisa_Saldo : 0;

        $newSaldo -= $request->nominal_pengeluaran;

        $lastPengeluaran = Pengeluaran::latest()->first();
        $lastReferenceNumber = $lastPengeluaran ? $lastPengeluaran->Nomor_Referensi : 'UL-000';

        $referenceNumber = 'UL-' . str_pad((intval(substr($lastReferenceNumber, 3)) + 1), 3, '0', STR_PAD_LEFT);

        $pengeluaran = Pengeluaran::create([
            'Nomor_Referensi' => $referenceNumber,
            'Nama_Kontak' => $request->nama_kontak,
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Nominal_Pengeluaran' => $request->nominal_pengeluaran,
            'Tanggal_Pengeluaran' => Carbon::parse($request->tanggal_pengeluaran)->format('Y-m-d'),
            'Deskripsi' => $request->deskripsi
        ]);

        Saldo::create([
            'pengeluaran_id' => $pengeluaran->id,
            'pemasukan_id' => null,
            'Transaksi' => 'Pengeluaran',
            'Nomor_Referensi' => $referenceNumber,
            'Sisa_Saldo' => $newSaldo
        ]);

        return redirect()->route('pencatatan.pengeluaran.index')->with('success', 'Data Pengeluaran Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.pengeluaran.edit', compact('pengeluaran', 'kontak', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataPengeluaranRequest $request, Pengeluaran $pengeluaran)
    {
        $saldo = Saldo::latest()->first();
        $originalNominal = $pengeluaran->Nominal_Pengeluaran;
        $updatedNominal = $request->nominal_pengeluaran;

        $nominalDifference = $originalNominal - $updatedNominal;

        $newSisaSaldo = $saldo ? $saldo->Sisa_Saldo : 0;
        $newSisaSaldo += $nominalDifference;

        $pengeluaran->update([
            // 'Nomor_Referensi' => $request->nomor_referensi,
            'Nama_Kontak' => $request->nama_kontak,
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Nominal_Pengeluaran' => $updatedNominal,
            'Tanggal_Pengeluaran' => Carbon::parse($request->tanggal_pengeluaran)->format('Y-m-d'),
            'Deskripsi' => $request->deskripsi
        ]);

        $saldo = $pengeluaran->saldo;
        if ($saldo) {
            $saldo->update([
                'pengeluaran_id' => $pengeluaran->id,
                'Transaksi' => 'Pengeluaran',
                // 'Nomor_Referensi' => $request->nomor_referensi,
                'Sisa_Saldo' => $newSisaSaldo
            ]);
        } else {
            $pengeluaran->saldo()->create([
                'pengeluaran_id' => $pengeluaran->id,
                'pemasukan_id' => null,
                'Transaksi' => 'Pengeluaran',
                // 'Nomor_Referensi' => $request->nomor_referensi,
                'Sisa_Saldo' => $newSisaSaldo
            ]);
        }

        return redirect()->route('pencatatan.pengeluaran.index')->with('success', 'Data Pengeluaran Berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        if ($pengeluaran->saldo) {
            $pengeluaran->saldo->delete();
        }
        $pengeluaran->delete();
        return redirect()->route('pencatatan.pengeluaran.index')->with('danger', 'Data Pengeluaran Berhasil dihapus');
    }
}
