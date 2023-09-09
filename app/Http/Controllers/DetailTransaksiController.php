<?php

namespace App\Http\Controllers;
use App\Models\RawatJalan;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\DetailObat;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $detail_transaksi = DetailTransaksiModel::orderBy('id_rincian_pembayaran', 'desc')->get();
        return view('detail_transaksi.index',[
            'title' => 'Details Transaksi',
            'preTitle' => 'Data Details Transaksi',
            'detail_transaksi' =>$detail_transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rawat_jalan = RawatJalan::orderBy('id_rawat_jalan', 'desc')->get();
        $detailObat = DetailObat::orderBy('id_detail_obat', 'desc')->get();
        $transaksi = TransaksiModel::orderBy('id_pembayaran', 'desc')->get();
        return view('detail_transaksi.create', [
            'title' => 'Details Transaksi',
            'preTitle' => 'Create | Data Details Transaksi',
            'rawat_jalan' => $rawat_jalan,
            'detailObat' => $detailObat,
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pembayaran' => 'required|integer|exists:transaksis,id_pembayaran',
            'id_rawat_jalan' => 'required|integer|exists:rawat_jalans,id_rawat_jalan',
            'id_detail_obat' => 'required|integer|exists:detail_obats,id_detail_obat',
            'tgl_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:0',
        ]);

        $detailTransaksi = new DetailTransaksiModel();
        $detailTransaksi->id_pembayaran = $validatedData->id_pembayaran;
        $detailTransaksi->id_rawat_jalan = $validatedData->id_rawat_jalan;
        $detailTransaksi->id_detail_obat = $validatedData->id_detail_obat;
        $detailTransaksi->tgl_pembayaran = $validatedData->tgl_pembayaran;
        $detailTransaksi->jumlah_pembayaran = $validatedData->jumlah_pembayaran;

        $detailTransaksi->save();

        return redirect('/detail_transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_rincian_pembayaran)
    {
       $rawat_jalan = RawatJalan::orderBy('id_rawat_jalan', 'desc')->get();
       $detailObat = DetailObat::orderBy('id_detail_obat', 'desc')->get();
       $transaksi = TransaksiModel::orderBy('id_pembayaran', 'desc')->get();
       $detail_transaksi = DetailTransaksiModel::findOrFail($id_rincian_pembayaran);
        return view('detail_transaksi.edit', [
            'title' => 'Details Transaksi',
            'preTitle' => 'Edit | '.$detail_transaksi->rawat_jalan->nama_pasien,
            'detail_transaksi' =>$detail_transaksi,
            'detailObat' =>$detailObat,
            'transaksi' =>$transaksi,
            'rawat_jalan' =>$rawat_jalan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id_rincian_pembayaran)
    {
        $details = DetailTransaksiModel::find($id_rincian_pembayaran);
        return view('detail_transaksi.detail', [
            'detail' =>$details,
            'preTitle' => 'Show | '.$details->rawat_jalan->nama_pasien,
            'title' => 'Details Transaksi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_rincian_pembayaran)
    {
        $validatedData = $request->validate([
            'id_pembayaran' => 'required|integer|exists:transaksis,id_pembayaran',
            'id_rawat_jalan' => 'required|integer|exists:rawat_jalans,id_rawat_jalan',
            'id_detail_obat' => 'required|integer|exists:detail_obats,id_detail_obat',
            'tgl_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:0',
        ]);
        $detailTransaksi = DetailTransaksiModel::findOrFail($id_rincian_pembayaran);
        $detailTransaksi->id_pembayaran = $validatedData->id_pembayaran;
        $detailTransaksi->id_rawat_jalan = $validatedData->id_rawat_jalan;
        $detailTransaksi->id_detail_obat = $validatedData->id_detail_obat;
        $detailTransaksi->tgl_pembayaran = $validatedData->tgl_pembayaran;
        $detailTransaksi->jumlah_pembayaran = $validatedData->jumlah_pembayaran;

        $detailTransaksi->save();
        return redirect('/detail_transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_rincian_pembayaran)
    {
       $detail_transaksi = DetailTransaksiModel::findOrFail($id_rincian_pembayaran);
       $detail_transaksi->delete();

        return redirect('/detail_transaksi');
    }
}
