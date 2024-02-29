<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataDeliveryOrderStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\Mobil;
use App\Models\Rute;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $do = DeliveryOrder::all();
        return view('frontend.pencatatan.do.index', compact('do'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobil = Mobil::all();
        $rute = Rute::all();
        return view('frontend.pencatatan.do.create', compact('mobil', 'rute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataDeliveryOrderStoreRequest $request)
    {
        DeliveryOrder::create([
            'NO_Do' => $request->no_do,
            'Tanggal_Do' => Carbon::parse($request->tanggal_do)->format('Y-m-d'),
            'Nomor_Polisi' => $request->nomor_polisi,
            'Nomor_Lambung' => $request->nomor_lambung,
            'SJB_Muat' => $request->sjb_muat,
            'SJB_Bongkar' => $request->sjb_bongkar,
            'Rute' => $request->rute,
            'Tonase' => $request->tonase,
            'Status' => 'Selesai',
        ]);

        return redirect()->route('pencatatan.do.index')->with('success', 'Data Delivery Order Berhasil ditambahkan');
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
    public function edit(DeliveryOrder $do)
    {
        $mobil = Mobil::all();
        $rute = Rute::all();
        return view('frontend.pencatatan.do.edit', compact('do', 'mobil', 'rute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataDeliveryOrderStoreRequest $request, DeliveryOrder $do)
    {
        $do->update([
            'NO_Do' => $request->no_do,
            'Tanggal_Do' => Carbon::parse($request->tanggal_do)->format('Y-m-d'),
            'Nomor_Polisi' => $request->nomor_polisi,
            'Nomor_Lambung' => $request->nomor_lambung,
            'SJB_Muat' => $request->sjb_muat,
            'SJB_Bongkar' => $request->sjb_bongkar,
            'Rute' => $request->rute,
            'Tonase' => $request->tonase,
        ]);

        return redirect()->route('pencatatan.do.index')->with('info', 'Data Delivery Order Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $do)
    {
        $do->delete();
        return redirect()->route('pencatatan.do.index')->with('danger', 'Data Delivery Order Berhasil dihapus');
    }
}
