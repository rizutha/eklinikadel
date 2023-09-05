<?php

namespace App\Http\Controllers;
use App\Models\ProdusenModel;
use Illuminate\Http\Request;

class ProdusenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produsen = ProdusenModel::all();
        return view('produsen.index', compact('produsen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produsen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_prod' => 'required',
        ]);


        ProdusenModel::create([
            'nm_prod' => $request->nm_prod,
        ]);

        return redirect('/produsen');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_prod)
    {
        $produsen = ProdusenModel::findOrFail($id_prod);

        return view('produsen.edit', compact('produsen'));
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
    public function update(Request $request, string $id_prod)
    {
        $this->validate($request, [
            'nm_prod' => 'required',
        ]);
    
        $produsen = ProdusenModel::findOrFail($id_prod);
        $produsen->update([
            'nm_prod' => $request->nm_prod,
        ]);
    
        return redirect('/produsen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_prod)
    {
        $produsen = ProdusenModel::findOrFail($id_prod);
        $produsen->delete();

        return redirect('/produsen');
    }
}
