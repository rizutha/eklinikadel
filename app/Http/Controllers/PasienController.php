<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PasienController extends Controller
{
    public function index()
    {   
        $pasiens = Pasien::orderBy('id', 'desc')->get();
        return view('pasien.index', [
            'pasiens' => $pasiens,
        ]);
    }


    public function create()
    {   
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pasien = new Pasien();
        $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $year = date("Y");
        $pasien->no_rm = $no_rm = $random . '.' . $year . '.' . $request->nama;
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
        $validator = Validator::make($request->all(), [
            'no_rm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pasien = Pasien::find($id);
        $pasien->no_rm = $request->no_rm;
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
