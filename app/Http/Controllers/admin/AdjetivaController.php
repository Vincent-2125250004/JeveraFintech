<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\DataAdjetivaRequest;
use App\Models\Adjetiva;
use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\Akun;
use App\Models\Pemasukan;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdjetivaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adjetiva = Adjetiva::all();
        return view('frontend.pencatatan.adjetiva.index', compact('adjetiva'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.adjetiva.create', compact('kontak', 'akun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataAdjetivaRequest $request)
    {
        $saldo = Saldo::latest()->first();

        $newSaldo = $saldo ? $saldo->Sisa_Saldo : 0;

        $newSaldo += $request->nominal_adjetiva;

        $lastAdjetiva = Adjetiva::latest()->first();
        $lastReferenceNumber = $lastAdjetiva ? $lastAdjetiva->Nomor_Referensi : 'ADJ-000';
        $referenceNumber = 'ADJ-' . str_pad((intval(substr($lastReferenceNumber, 4)) + 1), 3, '0', STR_PAD_LEFT);
        Adjetiva::create([
            'Nomor_Referensi' => $referenceNumber,
            'Nama_Kontak' => $request->nama_kontak,
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Nominal_Adjetiva' => $request->nominal_adjetiva,
            'Tanggal_Adjetiva' => Carbon::parse($request->tanggal_adjetiva)->format('Y-m-d'),
            'Deskripsi' => $request->deskripsi
        ]);

        Saldo::create([
            'Dari_Akun' => $request->dari_akun,
            'Ke_Akun' => $request->ke_akun,
            'Transaksi' => 'Adjetiva',
            'Nomor_Referensi' => $referenceNumber,
            'Sisa_Saldo' => $newSaldo
        ]);

        return redirect()->route('pencatatan.adjetiva.index')->with('success', 'Data Adjetiva berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adjetiva $adjetiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adjetiva $adjetiva)
    {
        $kontak = Kontak::all();
        $akun = Akun::all();
        return view('frontend.pencatatan.adjetiva.edit', compact('adjetiva','kontak', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataAdjetivaRequest $request, Adjetiva $adjetiva)
    {
        Pemasukan::update([
            'Nama_Kontak' => $request->Nama_Kontak,
            'Dari_Akun' => $request->Dari_Akun,
            'Ke_Akun' => $request->Ke_Akun,
            'Nominal_Adjetiva' => $request->Nominal_Adjetiva,
            'Tanggal_Adjetiva' => Carbon::parse($request->Tanggal_Adjetiva)->format('Y-m-d'),
            'Deskripsi' => $request->Deskripsi
        ]);
        return redirect()->route('pencatatan.adjetiva.index')->with('info', 'Data Adjetiva berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adjetiva $adjetiva)
    {
        if ($adjetiva->saldo) {
            $adjetiva->saldo->delete();
        }
        $adjetiva->delete();
        return redirect()->route('pencatatan.adjetiva.index')->with('danger', 'Data Adjetiva berhasil dihapus');
    }
}
