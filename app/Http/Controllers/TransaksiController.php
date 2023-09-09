<?php

namespace App\Http\Controllers;
use App\Models\TransaksiModel;
use App\Models\Pendaftarans;
use App\Models\KasirModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $transaksi = TransaksiModel::orderBy('id_pembayaran', 'desc')->get();
        return view('transaksi.index',[
            'title' => 'Transaksi pembayaran',
            'preTitle' => 'Data Transaksi pembayaran',
            'transaksi' =>$transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftaran = Pendaftarans::orderBy('no_reg', 'desc')->get();
        $kasir = KasirModel::orderBy('id_kasir', 'desc')->get();
        return view('transaksi.create', [
            'title' => 'Transaksi pembayaran',
            'preTitle' => 'Create | Data Transaksi pembayaran',
            'pendaftaran' => $pendaftaran,
            'kasir' => $kasir,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_pembayaran' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'total_pembayaran' => 'required|numeric',
            'jml_dibayar' => 'required|numeric',
            'sisa_pembayaran' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'id_kasir' => 'required|exists:kasirs,id_kasir',
            'no_reg' => 'required|exists:pendaftarans,no_reg',
        ]);

        $transaksi = new TransaksiModel();
        $transaksi->tgl_pembayaran = $validatedData->tgl_pembayaran;
        $transaksi->nama_pelanggan = $validatedData->nama_pelanggan;
        $transaksi->alamat = $validatedData->alamat;
        $transaksi->metode_pembayaran = $validatedData->metode_pembayaran;
        $transaksi->total_pembayaran = $validatedData->total_pembayaran;
        $transaksi->jml_dibayar = $validatedData->jml_dibayar;
        $transaksi->sisa_pembayaran = $validatedData->sisa_pembayaran;
        $transaksi->id_kasir = $validatedData->id_kasir;
        $transaksi->no_reg = $validatedData->no_reg;
        $transaksi->save();

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_pembayaran)
    {
       $pendaftaran = Pendaftarans::orderBy('no_reg', 'desc')->get();
       $kasir = KasirModel::orderBy('id_kasir', 'desc')->get();
       $transaksi = TransaksiModel::findOrFail($id_pembayaran);
        return view('transaksi.edit', [
            'title' => 'Transaksi pembayaran',
            'preTitle' => 'Edit | '.$transaksi->pendaftaran->nama_pasien,
            'transaksi' =>$transaksi,
            'kasir' =>$kasir,
            'pendaftaran' =>$pendaftaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id_pembayaran)
    {
        $details = TransaksiModel::find($id_pembayaran);
        return view('transaksi.detail', [
            'detail' =>$details,
            'preTitle' => 'Show | '.$details->pendaftaran->nama_pasien,
            'title' => 'Transaksi pembayaran'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pembayaran)
    {
        $validatedData = $request->validate([
            'tgl_pembayaran' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'total_pembayaran' => 'required|numeric',
            'jml_dibayar' => 'required|numeric',
            'sisa_pembayaran' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'id_kasir' => 'required|exists:kasirs,id_kasir',
            'no_reg' => 'required|exists:pendaftarans,no_reg',
        ]);
    
        $transaksi = TransaksiModel::findOrFail($id_pembayaran);
        $transaksi->tgl_pembayaran = $validatedData->tgl_pembayaran;
        $transaksi->nama_pelanggan = $validatedData->nama_pelanggan;
        $transaksi->alamat = $validatedData->alamat;
        $transaksi->metode_pembayaran = $validatedData->metode_pembayaran;
        $transaksi->total_pembayaran = $validatedData->total_pembayaran;
        $transaksi->jml_dibayar = $validatedData->jml_dibayar;
        $transaksi->sisa_pembayaran = $validatedData->sisa_pembayaran;
        $transaksi->id_kasir = $validatedData->id_kasir;
        $transaksi->no_reg = $validatedData->no_reg;
        $transaksi->save();

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pembayaran)
    {
       $transaksi = TransaksiModel::findOrFail($id_pembayaran);
       $transaksi->delete();

        return redirect('/transaksi');
    }
}
