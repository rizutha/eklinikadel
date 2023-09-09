<?php

namespace App\Http\Controllers;
use App\Models\SatuanModel;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = SatuanModel::all();
        return view('satuan.index',[
            'title' => 'Satuan',
            'preTitle' => 'Data Satuan',
            'satuan' => $satuan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create', [
            'title' => 'Satuan',
            'preTitle' => 'Create | Data Satuan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_satuan' => 'required',
        ]);


        SatuanModel::create([
            'jenis_satuan' => $request->jenis_satuan,
        ]);

        return redirect('/satuan');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id_satuan)
    {
        $satuan = SatuanModel::findOrFail($id_satuan);

        return view('satuan.edit', [
            'title' => 'Satuan',
            'preTitle' => 'Edit | '.$satuan->jenis_satuan,
            'satuan' => $satuan
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
    public function update(Request $request, string $id_satuan)
    {
        $this->validate($request, [
            'jenis_satuan' => 'required',
        ]);
    
        $satuan = SatuanModel::findOrFail($id_satuan);
        $satuan->update([
            'jenis_satuan' => $request->jenis_satuan,
        ]);
    
        return redirect('/satuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_satuan)
    {
        $satuan = SatuanModel::findOrFail($id_satuan);
        $satuan->delete();

        return redirect('/satuan');
    }
}
