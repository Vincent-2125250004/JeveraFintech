<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMobilStoreRequest;
use App\Models\BerkasPendukung;
use App\Models\Mobil;
use Carbon\Carbon;

class DataMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Mobil::all();
        return view('frontend.datamaster.mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.datamaster.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataMobilStoreRequest $request) {  
        

        $newMobil = Mobil::create([
            'Nomor_Polisi' => $request->nomor_polisi,
            'Nomor_Lambung' => $request->nomor_lambung,
            'Pemilik' => $request->pemilik,
            'Nomor_Seri' => $request->nomor_seri,
            'Nomor_Rangka' => $request->nomor_rangka,
            'Nomor_Mesin' => $request->nomor_mesin,
            'Tanggal_Masuk' => Carbon::parse($request->tanggal_masuk)->format('Y-m-d'),
            'Tanggal_Keluar' => $request->tanggal_keluar,
        ]);
        
        $i=1;
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $request->nomor_lambung .'-berkas'.$i.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('berkas-images'), $imageName);
                BerkasPendukung::create([
                    'mobil_ID_Mobil' => $newMobil->ID_Mobil,
                    'images' => $imageName
                ]);
                $i++;
            }
        }
        
        return redirect()->route('datamaster.mobil.index')->with('success', 'Data Mobil Berhasil ditambahkan');

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
    public function edit(Mobil $mobil)
    {
        return view('frontend.datamaster.mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataMobilStoreRequest $request, Mobil $mobil)
    {
        $mobil->update([
            'Nomor_Polisi' => $request->nomor_polisi,
            'Nomor_Lambung' => $request->nomor_lambung,
            'Pemilik' => $request->pemilik,
            'Nomor_Seri' => $request->nomor_seri,
            'Nomor_Rangka' => $request->nomor_rangka,
            'Nomor_Mesin' => $request->nomor_mesin,
            'Tanggal_Masuk' => Carbon::parse($request->tanggal_masuk)->format('Y-m-d'),
            'Tanggal_Keluar' => Carbon::parse($request->tanggal_keluar)->format('Y-m-d'),
        ]);

        return redirect()->route('datamaster.mobil.index')->with('info', 'Data Mobil Berhasil Diperbarui');
    }

    public function images($id){
        $mobil = Mobil::find($id);
        if (!$mobil) abort (404);
        return view ('frontend.datamaster.mobil.berkas', compact('mobil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {   
        $mobil->berkas()->delete();
        $mobil->delete();
        return redirect()->route('datamaster.mobil.index')->with('danger', 'Data Mobil Berhasil Dihapus');
    }
}
