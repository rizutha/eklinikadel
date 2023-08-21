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
}
