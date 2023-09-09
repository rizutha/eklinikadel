<?php

namespace App\Http\Controllers;
use App\Models\BatchModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = BatchModel::orderBy('id_batch', 'desc')->get();
        return view('batch.index',[
            'title' => 'Batch Obat',
            'preTitle' => 'Data Batch Obat',
            'batch' => $batch,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('batch.create', [
            'title' => 'Batch obat',
            'preTitle' => 'Data Batch obat'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'harga_beli' => 'required',
            'jumlah_masuk' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        // Simpan data
        BatchModel::create([
            'harga_beli' => $request->harga_beli,
            'jumlah_masuk' => $request->jumlah_masuk,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
        ]);

        return redirect('/batch');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_batch)
    {
        $batch = BatchModel::findOrFail($id_batch);

        return view('batch.edit',[
            'batch' => $batch,
            'title' => 'Batch Obat',
            'preTitle' => 'Edit | '. $batch->id_batch,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_batch)
    {

        $this->validate($request, [
            'harga_beli' => 'required',
            'jumlah_masuk' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        // Simpan data
        $batch = BatchModel::findOrFail($id_batch);
        $batch->update([
            'harga_beli' => $request->harga_beli,
            'jumlah_masuk' => $request->jumlah_masuk,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
        ]);
       
        return redirect('/batch');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_batch)
    {
        
        $batch = BatchModel::findOrFail($id_batch);
        $batch->delete();

        return redirect('/batch');
    }
}
