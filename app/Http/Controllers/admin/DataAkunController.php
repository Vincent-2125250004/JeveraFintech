<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataAkunStoreRequest;
use App\Models\Akun;
use Illuminate\Http\Request;

class DataAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = Akun::all();
        return view('frontend.datamaster.akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.datamaster.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataAkunStoreRequest $request)
    {
        Akun::create([
            'Nama_Akun'=>$request->nama_akun,
            'Kategori'=>$request->kategori_akun,
            'Tipe_Transaksi'=>$request->tipe_transaksi,
        ]);
        
        return to_route('datamaster.akun.index')->with('success', 'Data Akun Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun)
    {
        return view('frontend.datamaster.akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataAkunStoreRequest $request, Akun $akun)
    {
        $akun->update([
            'Nama_Akun' => $request->nama_akun,
            'Kategori' => $request->kategori_akun,
            'Tipe_Transaksi' => $request->tipe_transaksi,
        ]);

        return redirect()->route('datamaster.akun.index')->with('success', 'Data Akun Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun)
    {
        $akun->delete();

        return to_route('datamaster.akun.index')->with('danger', 'Data Akun Berhasil Dihapus');
    }
}
