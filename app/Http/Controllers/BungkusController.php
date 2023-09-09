<?php

namespace App\Http\Controllers;
use App\Models\BungkusModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BungkusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bungkus = BungkusModel::orderBy('id_bungkus', 'desc')->get();
        return view('bungkus.index',[
            'title' => 'Bungkus',
            'preTitle' => 'Data Bungkus',
            'bungkus' => $bungkus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bungkus.create',[
            'title' => 'Bungkus',
            'preTitle' => 'Create | Data Bungkus',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_bungkus' => 'required',
            'harga_bungkus' => 'required',
        ]);

        // Simpan data
        BungkusModel::create([
            'jenis_bungkus' => $request->jenis_bungkus,
            'harga_bungkus' => $request->harga_bungkus,
        ]);

        return redirect('/bungkus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_bungkus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_bungkus)
    {
        $bungkus = BungkusModel::findOrFail($id_bungkus);

        return view('bungkus.edit',[
            'title' => 'Bungkus',
            'preTitle' => 'Edit | '. $bungkus->jenis_bungkus,
            'bungkus' => $bungkus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_bungkus)
    {

        $this->validate($request, [
            'jenis_bungkus' => 'required',
            'harga_bungkus' => 'required',
        ]);

        // Simpan data
        $bungkus = BungkusModel::findOrFail($id_bungkus);
        $bungkus->update([
            'jenis_bungkus' => $request->jenis_bungkus,
            'harga_bungkus' => $request->harga_bungkus,
        ]);
       
        return redirect('/bungkus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_bungkus)
    {
        
        $bungkus = BungkusModel::findOrFail($id_bungkus);
        $bungkus->delete();

        return redirect('/bungkus');
    }
}
