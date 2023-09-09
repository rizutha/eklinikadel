<?php

namespace App\Http\Controllers;
use App\Models\RawatJalan;
use App\Models\Pendaftarans;
use App\Models\TindakanModel;
use App\Models\PoliModel;
use Illuminate\Http\Request;

class RawatJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $rawat_jalan = RawatJalan::orderBy('id_rawat_jalan', 'desc')->get();
        return view('rawat_jalan.index',[
            'title' => 'Rawat Jalan',
            'preTitle' => 'Data Rawat Jalan',
            'rawat_jalan' =>$rawat_jalan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftaran = Pendaftarans::orderBy('no_reg', 'desc')->get();
        $poli = PoliModel::orderBy('id_poli', 'desc')->get();
        $tindakan = TindakanModel::orderBy('id_tindakan', 'desc')->get();
        return view('rawat_jalan.create', [
            'title' => 'Rawat Jalan',
            'preTitle' => 'Create | Data Rawat Jalan',
            'pendaftaran' => $pendaftaran,
            'poli' => $poli,
            'tindakan' => $tindakan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateRawatJalan = $request->validate([
            'no_reg' => 'required|integer',
            'id_tindakan' => 'required|integer',
            'id_poli' => 'required|integer',
            'qty' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);

        $rawatJalan = new RawatJalan();
        $rawatJalan->no_reg = $validateRawatJalan->no_reg;
        $rawatJalan->id_tindakan = $validateRawatJalan->id_tindakan;
        $rawatJalan->id_poli = $validateRawatJalan->id_poli;
        $rawatJalan->qty = $validateRawatJalan->qty;
        $rawatJalan->subtotal = $validateRawatJalan->subtotal;
        $rawatJalan->save();

        return redirect('/rawat_jalan');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_rawat_jalan)
    {
       $pendaftaran = Pendaftarans::orderBy('no_reg', 'desc')->get();
       $poli = PoliModel::orderBy('id_poli', 'desc')->get();
       $tindakan = TindakanModel::orderBy('id_tindakan', 'desc')->get();
       $rawat_jalan = RawatJalan::findOrFail($id_rawat_jalan);
        return view('rawat_jalan.edit', [
            'title' => 'Rawat Jalan',
            'preTitle' => 'Edit | '.$rawat_jalan->pendaftaran->nama_pasien,
            'rawat_jalan' =>$rawat_jalan,
            'poli' =>$poli,
            'tindakan' =>$tindakan,
            'pendaftaran' =>$pendaftaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id_rawat_jalan)
    {
        $details = RawatJalan::find($id_rawat_jalan);
        return view('rawat_jalan.detail', [
            'detail' =>$details,
            'preTitle' => 'Show | '.$details->pendaftaran->nama_pasien,
            'title' => 'Rawat Jalan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_rawat_jalan)
    {
        $validateRawatJalan = $request->validate([
            'no_reg' => 'required|integer',
            'id_tindakan' => 'required|integer',
            'id_poli' => 'required|integer',
            'qty' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);
    
        $rawatJalan = RawatJalan::findOrFail($id_rawat_jalan);
        $rawatJalan->no_reg = $validateRawatJalan->no_reg;
        $rawatJalan->id_tindakan = $validateRawatJalan->id_tindakan;
        $rawatJalan->id_poli = $validateRawatJalan->id_poli;
        $rawatJalan->qty = $validateRawatJalan->qty;
        $rawatJalan->subtotal = $validateRawatJalan->subtotal;
        $rawatJalan->save();
        return redirect('/rawat_jalan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_rawat_jalan)
    {
       $rawat_jalan = RawatJalan::findOrFail($id_rawat_jalan);
       $rawat_jalan->delete();

        return redirect('/rawat_jalan');
    }
}
