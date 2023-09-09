<?php

namespace App\Http\Controllers;
use App\Models\DokterModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = DokterModel::orderBy('id_dokter', 'desc')->get();
        return view('dokter.index',[
            'title' => 'Dokter',
            'preTitle' => 'Data Dokter',
            'dokter' => $dokter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create', [
            'title' => 'Dokter',
            'preTitle' => 'Create | Data Dokter',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'spesialisasi' => 'required',
            'no_hp' => 'nullable',
        ]);


        // Simpan data
        DokterModel::create([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'ho_hp' => $request->ho_hp,
        ]);
        

        return redirect('/dokter');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_dokter)
    {
        $dokter = DokterModel::findOrFail($id_dokter);

        return view('dokter.edit',[
            'title' => 'Dokter',
            'preTitle' => 'Edit | '.$dokter->nama,
            'dokter' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_dokter)
    {

        $this->validate($request, [
            'nama' => 'required',
            'spesialisasi' => 'required',
            'no_hp' => 'nullable',
        ]);


        // Simpan data
        $dokter = DokterModel::findOrFail($id_dokter);
        $dokter->update([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'ho_hp' => $request->ho_hp,
        ]);
       
        return redirect('/dokter');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_dokter)
    {
        
        $dokter = DokterModel::findOrFail($id_dokter);
        $dokter->delete();

        return redirect('/dokter');
    }
}
