<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataKontakStoreRequest;
use Illuminate\Http\Request;
use App\Models\Kontak;

class DataKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::all();
        return view('frontend.datamaster.kontak.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.datamaster.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataKontakStoreRequest $request)
    {
        Kontak::create([
            'Nama_Kontak'=>$request->nama_kontak,
            'Nomor_Telepon'=>$request->nomor_telepon,
            'Tipe_Kontak'=>$request->tipe_kontak,
        ]);

        return redirect()->route('datamaster.kontak.index')->with('success', 'Data Kontak Berhasil Ditambahkan');
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
    public function edit(Kontak $kontak)
    {
        return view('frontend.datamaster.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataKontakStoreRequest $request, Kontak $kontak)
    {
        $kontak->update([
            'Nama_Kontak'=>$request->nama_kontak,
            'Nomor_Telepon'=>$request->nomor_telepon,
            'Tipe_Kontak'=>$request->tipe_kontak,
        ]);

        return redirect()->route('datamaster.kontak.index')->with('info', 'Data Kontak Berhasil Diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('datamaster.kontak.index')->with('danger', 'Data Kontak Berhasil Dihapus');
    }

}