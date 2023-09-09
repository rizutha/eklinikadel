<?php

namespace App\Http\Controllers;
use App\Models\DetailObat;
use app\Models\Obat;
use app\Models\Pendaftarans;
use app\Models\BungkusModel;
use Illuminate\Http\Request;


class DetailObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_obat = DetailObat::orderBy('id_detail_obat', 'desc')->get();
        return view('detail_obat.index', [
            'title' => 'Detail Obat',
            'preTitle' => 'Data Detail Obat',
            'detail_obat' => $detail_obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obat = Obat::orderby('id_obat', 'desc')->get();
        $pendaftaran = Pendaftarans::orderby('no_reg', 'desc')->get();
        $bungkus = BungkusModel::orderby('id_bungkus', 'desc')->get();
        return view('detail_obat.create', [
            'title' => 'Detail Obat',
            'preTitle' => 'Create | Data Detail Obat',
            'obat' => $obat,
            'bungkus' => $bungkus,
            'pendaftaran' => $pendaftaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_reg' => 'required|integer|exists:pendaftarans,no_reg',
            'id_obat' => 'required|integer|exists:obats,id_obat',
            'id_bungkus' => 'required|integer|exists:bungkus,id_bungkus',
            'qty' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);
    
        $detailObat = new DetailObat();
    
        $detailObat->no_reg = $request->no_reg;
        $detailObat->id_obat = $request->id_obat;
        $detailObat->id_bungkus = $request->id_bungkus;
        $detailObat->qty = $request->qty;
        $detailObat->subtotal = $request->subtotal;
        $detailObat->save();
       
       return redirect('/detail_obat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_detail_obat)
    {
        $details = DetailObat::find($id_detail_obat);
        return view('detail_obat.detail', [
           'detail' => $details,
           'preTitle' => 'Show | '.$details->obat->nama_obat,
           'title' => 'Detai lObat'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_detail_obat)
    {
        $detail_obat = DetailObat::find($id_detail_obat);
        $obat = Obat::orderby('id_obat', 'desc')->get();
        $pendaftaran = Pendaftarans::orderby('no_reg', 'desc')->get();
        $bungkus = BungkusModel::orderby('id_bungkus', 'desc')->get();
        return view('detail_obat.create', [
            'title' => 'Detail Obat',
            'preTitle' => 'Create | Data Detail Obat',
            'obat' => $obat,
            'bungkus' => $bungkus,
            'pendaftaran' => $pendaftaran,
            'detail_obat' => $detail_obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_detail_obat)
    {
        $request->validate([
            'no_reg' => 'required|integer|exists:pendaftarans,no_reg',
            'id_obat' => 'required|integer|exists:obats,id_obat',
            'id_bungkus' => 'required|integer|exists:bungkus,id_bungkus',
            'qty' => 'required|integer',
            'subtotal' => 'required|numeric',
           ]);
    
            $detailObat = DetailObat::find($id_detail_obat);
            $detailObat->no_reg = $request->no_reg;
            $detailObat->id_obat = $request->id_obat;
            $detailObat->id_bungkus = $request->id_bungkus;
            $detailObat->qty = $request->qty;
            $detailObat->subtotal = $request->subtotal;
            $detailObat->save();

            return redirect('/detail_obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_detail_obat)
    {
        $detail_obat = DetailObat::find($id_detail_obat);
        $detail_obat->delete();
        return redirect('/detail_obat');
    }
}
