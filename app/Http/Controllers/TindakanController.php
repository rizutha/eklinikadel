<?php

namespace App\Http\Controllers;
use App\Models\TindakanModel;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tindakan = TindakanModel::all();
        return view('tindakan.index', [
            'title' => 'Tindakan',
            'preTitle' => 'Data Tindakan',
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakan.create', [
            'title' => 'Tindakan',
            'preTitle' => 'Create | Data Tindakan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_tindakan' => 'required',
            'harga' => 'required',
        ]);


        // Simpan data
        TindakanModel::create([
            'nm_tindakan' => $request->nm_tindakan,
            'harga' => $request->harga,
        ]);

        return redirect('/tindakan');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_tindakan)
    {
        $tindakan = TindakanModel::findOrFail($id_tindakan);

        return view('tindakan.edit', [
            'title' => 'Tindakan',
            'preTitle' => 'Edit | '.$tindakan->nm_tindakan,
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nm_tindakan' => 'required',
            'harga' => 'required',
        ]);
    
        $tindakan = TindakanModel::findOrFail($id);
        $tindakan->update([
            'nm_tindakan' => $request->nm_tindakan,
            'harga' => $request->harga,
        ]);
    
        return redirect('/tindakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tindakan = TindakanModel::findOrFail($id);
        $tindakan->delete();

        return redirect('/tindakan');
    }
}
