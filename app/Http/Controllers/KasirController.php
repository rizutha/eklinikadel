<?php

namespace App\Http\Controllers;
use App\Models\KasirModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasir = KasirModel::orderBy('id_kasir', 'desc')->get();
        return view('kasir.index', [
            'title' => 'Kasir',
            'preTitle' => 'Data Kasir',
            'kasir' => $kasir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.create', [
            'title' => 'Kasir',
            'preTitle' => 'Create | Data Kasir',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kasir' => 'required',
            'username' => 'required|unique:kasirs',
            'password' => 'required',
            'nama' => 'required',
            'no_handphone' => 'required',
        ]);


        // Simpan data
        KasirModel::create([
            'nama_kasir' => $request->nama_kasir,
            'username' => $request->username,
            'password' => bcrypt($request->password), 
            'nama' => $request->nama,
            'no_handphone' => $request->no_handphone,
        ]);
        

        return redirect('/kasir');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_kasir)
    {
        $kasir = KasirModel::findOrFail($id_kasir);

        return view('kasir.edit',[
            'title' => 'Kasir',
            'preTitle' => 'Edit | '.$kasir->nama_kasir,
            'kasir' => $kasir
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kasir)
    {

        $this->validate($request, [
            'nama_kasir' => 'required',
            'username' => 'required|unique:kasirs',
            'password' => 'required',
            'nama' => 'required',
            'no_handphone' => 'required',
        ]);


        // Simpan data
        $kasir = KasirModel::findOrFail($id_kasir);
        $kasir->update([
            'nama_kasir' => $request->nama_kasir,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'no_handphone' => $request->no_handphone,
        ]);
       
        return redirect('/kasir');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kasir)
    {
        
        $kasir = KasirModel::findOrFail($id_kasir);
        $kasir->delete();

        return redirect('/kasir');
    }
}
