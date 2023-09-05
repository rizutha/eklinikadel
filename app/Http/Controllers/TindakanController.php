<?php

namespace App\Http\Controllers;
use App\Models\TidakanModel;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tindakan = TidakanModel::all();
        return view('tindakan.index', compact('tindakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakan.create');
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
        TidakanModel::create([
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

        return view('tindakan.edit', compact('tindakan'));
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
    
        $tindakan = TidakanModel::findOrFail($id);
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
        $tindakan = TidakanModel::findOrFail($id);
        $tindakan->delete();

        return redirect('/tindakan');
    }
}
