<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\DataRuteStoreRequest;
use App\Models\Rute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataRuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = Rute::all();
        return view('frontend.datamaster.rute.index', compact('rute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.datamaster.rute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataRuteStoreRequest $request)
    {
        Rute::create([
            'Asal_Rute'=>$request->asal_rute,
            'Tujuan_Rute'=>$request->tujuan_rute,
        ]);

        return redirect()->route('datamaster.rute.index')->with('success', 'Data Rute Berhasil Ditambahkan');
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
    public function edit(Rute $rute)
    {
        return view('frontend.datamaster.rute.edit', compact('rute'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(DataRuteStoreRequest $request, Rute $rute)
    {
        $rute->update([
            'Asal_Rute'=>$request->asal_rute,
            'Tujuan_Rute'=>$request->tujuan_rute,
        ]);

        return redirect()->route('datamaster.rute.index')->with('info', 'Data Rute Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rute $rute)
    {
        $rute->delete();
        return redirect()->route('datamaster.rute.index')->with('danger', 'Data Rute Berhasil Dihapus');
    }
}
