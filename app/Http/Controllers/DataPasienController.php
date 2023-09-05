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
        $dataPasien = DataPasiens::all();
        return view('data_pasien.index', compact('dataPasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'tanggal_terakhir_periksa' => 'required|date',
            'status' => 'required',
        ]);

        $year = date('Y');
        $nama = str_replace(' ', '_', $request->Nama_lengkap);
        $nomor_rm = mt_rand(1000, 9999) . $year . $nama;

        $tgl_lahir = Carbon::parse($request->tgl_lahir);
        $umur = $tgl_lahir->age;

        // Simpan data
        DataPasiens::create([
            'no_rm' => $nomor_rm,
            'Nama_lengkap' => $request->Nama_lengkap,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $umur,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'tanggal_terakhir_periksa' => $request->tanggal_terakhir_periksa,
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

        return view('data_pasien.edit', compact('dataPasien'));
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
            'tanggal_terakhir_periksa' => 'required|date',
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
            'tanggal_terakhir_periksa' => $request->tanggal_terakhir_periksa,
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
