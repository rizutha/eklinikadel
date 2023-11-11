<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function pendaftaranPasien()
    {
        return view('daftar.index', [
            'title' => 'Pasien Pendaftaran',
        ]);
    }
    public function pelayananRawatJalan()
    {
        return view('RawatJalan.index', [
            'title' => 'Pelayanan Rawat Jalan',
        ]);
    }
    public function Apotek()
    {
        return view('apotek.index', [
            'title' => 'Aplikasi Apotek'
        ]);
    }
    public function kasir()
    {
        return view('kasirs.index', [
            'title' => 'Aplikasi Kasir'
        ]);
    }
}
