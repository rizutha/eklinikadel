<?php

namespace App\Http\Controllers;
use App\Models\PoliModel;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = PoliModel::all();
        return view('poli.index', compact('poli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_poli' => 'required',
        ]);


        // Simpan data
        PoliModel::create([
            'nm_poli' => $request->nm_poli,
        ]);

        return redirect('/poli');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_poli)
    {
        $poli = poliModel::findOrFail($id_poli);

        return view('poli.edit', compact('poli'));
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
    public function update(Request $request, string $id_poli)
    {
        $this->validate($request, [
            'nm_poli' => 'required',
        ]);
    
        $poli = PoliModel::findOrFail($id_poli);
        $poli->update([
            'nm_poli' => $request->nm_poli,
        ]);
    
        return redirect('/poli');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_poli)
    {
        $poli = PoliModel::findOrFail($id_poli);
        $poli->delete();

        return redirect('/poli');
    }
}
