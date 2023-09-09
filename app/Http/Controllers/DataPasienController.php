<?php

namespace App\Http\Controllers;
use App\Models\DataPasiens;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPasien = DataPasiens::orderBy('id', 'desc')->get();
        return view('data_pasien.index',[
            'title' => 'Pasien',
            'preTitle' => 'Data Pasien',
            'dataPasien' => $dataPasien
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pasien.create', [
            'title' => 'Pasien',
            'preTitle' => 'Create | Data Pasien',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => '',
            'Nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'status' => 'required',
        ]);

        // $year = date('Y');
        $nomor_rm = mt_rand(1000, 9999) . date('ymd');
        $tgl_lahir = Carbon::parse($request->tgl_lahir);
        $umur = $tgl_lahir->age;
        $random = mt_rand(1000, 9999). date('ym');

        // Simpan data
        DataPasiens::create([
            'id' => $random,
            'no_rm' => $nomor_rm,
            'Nama_lengkap' => $request->Nama_lengkap,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $umur,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'status' => $request->status,
        ]);

        return redirect('/data_pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataPasien = DataPasiens::findOrFail($id);

        return view('data_pasien.edit',[
            'title' => 'Pasien',
            'preTitle' => 'Edit | '. $dataPasien->Nama_lengkap,
            'dataPasien' => $dataPasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'Nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'status' => 'required',
        ]);
    
        $dataPasien = DataPasiens::findOrFail($id);
        $tgl_lahir = Carbon::parse($request->tgl_lahir);
        $umur = $tgl_lahir->age;
        $dataPasien->update([
            'Nama_lengkap' => $request->Nama_lengkap,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $umur,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'status' => $request->status,
        ]);
    
        return redirect('/data_pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $dataPasien = DataPasiens::findOrFail($id);
        $dataPasien->delete();

        return redirect('/data_pasien');
    }
}
