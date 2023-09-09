<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use app\Models\ProdusenModel;
use app\Models\SatuanModel;
use app\Models\BatchModel;
use Illuminate\Http\Request;


class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::orderBy('id_obat', 'desc')->get();
        return view('obat.index', [
            'title' => 'Obat',
            'preTitle' => 'Data Obat',
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produsen = ProdusenModel::orderby('id_produsen', 'desc')->get();
        $satuan = SatuanModel::orderby('id_satuan', 'desc')->get();
        $batch = BatchModel::orderby('id_batch', 'desc')->get();
        return view('obat.create', [
            'title' => 'Obat',
            'preTitle' => 'Create | Data Obat',
            'produsen' => $produsen,
            'batch' => $batch,
            'satuan' => $satuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validateObat = $request->validate([
        'tgl_input'=> 'required',
        'nama_obat'=> 'required',
        'id_prod'=> 'required',
        'id_satuan'=> 'required',
        'id_batch'=> 'required',
        'tgl_exp'=> 'required',
        'HNA'=> 'required',
        'PPN'=> 'required',
       ]);

       $obat = new Obat();
       $obat->tgl_input = $validateObat->tgl_input;
       $obat->nama_obat = $validateObat->nama_obat;
       $obat->id_prod = $validateObat->id_prod;
       $obat->id_satuan = $validateObat->id_satuan;
       $obat->id_batch = $validateObat->id_batch;
       $obat->tgl_exp = $validateObat->tgl_exp;
       $obat->HNA = $validateObat->HNA;
       $obat->PPN = $validateObat->PPN;
       $obat->save();
       
       return redirect('/obat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_obat)
    {
        $details = Obat::find($id_obat);
        return view('obat.detail', [
           'detail' => $details,
           'preTitle' => 'Show | '.$details->nama_obat,
           'title' => 'Obat'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_obat)
    {
        $details = Obat::find($id_obat);
        $produsen = ProdusenModel::orderby('id_produsen', 'desc')->get();
        $satuan = SatuanModel::orderby('id_satuan', 'desc')->get();
        $batch = BatchModel::orderby('id_batch', 'desc')->get();
        return view('obat.edit', [
            'title' => 'Obat',
            'preTitle' => 'Edit | '.$details->nama_obat,
            'produsen' => $produsen,
            'batch' => $batch,
            'satuan' => $satuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_obat)
    {
        $validateObat = $request->validate([
            'tgl_input'=> 'required',
            'nama_obat'=> 'required',
            'id_prod'=> 'required',
            'id_satuan'=> 'required',
            'id_batch'=> 'required',
            'tgl_exp'=> 'required',
            'HNA'=> 'required',
            'PPN'=> 'required',
           ]);
    
           $obat = Obat::find($id_obat);
           $obat->tgl_input = $validateObat->tgl_input;
           $obat->nama_obat = $validateObat->nama_obat;
           $obat->id_prod = $validateObat->id_prod;
           $obat->id_satuan = $validateObat->id_satuan;
           $obat->id_batch = $validateObat->id_batch;
           $obat->tgl_exp = $validateObat->tgl_exp;
           $obat->HNA = $validateObat->HNA;
           $obat->PPN = $validateObat->PPN;
           $obat->save();
           
           return redirect('/obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_obat)
    {
        $obat = Obat::find($id_obat);
        $obat->delete();
        return redirect('/obat');
    }
}
