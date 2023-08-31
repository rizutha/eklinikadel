<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {   
        return view('pasien.index', [
            'pasiens' => Pasien::get(),
        ]);
    }


    public function create()
    {   
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $pasien = new Pasien();

        $pasien->id = $request->id;
        //$pasien->no_rm = $request->no_rm;
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->nomor_telp = $request->nomor_telp;

        $pasien->save();

        return redirect()->route('pasien.index');
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);

        return view('pasien.edit', ['pasien' => $pasien,]);
    }
    

    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);

        $pasien->id = $request->id;
        //$pasien->no_rm = $request->no_rm;
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->nomor_telp = $request->nomor_telp;

        $pasien->save();

        return redirect()->route('pasien.index');
    }


    public function destroy($id)
    {
      $pasien = Pasien::find($id);
      $pasien->delete();
    
      return redirect('/pasien');
    }
    
}
