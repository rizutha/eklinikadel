<?php

namespace App\Http\Controllers;
use App\Models\DataPasiens;
use Illuminate\Http\Request;
use App\Models\Pendaftarans;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftarans::orderBy('no_reg', 'desc')->get();
        return view('pendaftaran.index', [
            'title' => 'Pendaftaran',
            'preTitle' => 'Data Pendaftaran',
            'pendaftarans' => $pendaftarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataPasiens = DataPasiens::orderBy('id', 'desc')->get();
        return view('pendaftaran.create', compact('dataPasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required',
        ]);

        Pendaftarans::create([
            'no_rm' => $request->no_rm,
        ]);

        return redirect('/pendaftaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $no_reg)
    {
        $details = Pendaftarans::find($no_reg);
        return view('pendaftaran.detail', [
            'detail' =>$details,
            'preTitle' => 'Show | '.$details->dataPasien->Nama_lengkap,
            'title' => 'Pendaftaran'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $no_reg)
    {
        $pendaftarans = Pendaftarans::find($no_reg);
        $dataPasiens = DataPasiens::all();
        return view('pendaftaran.edit', compact('pendaftarans', 'dataPasiens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $no_reg)
    {
        $this->validate($request, [
            'no_rm' => 'required',
        ]);
    
        $pendaftaran = Pendaftarans::find($no_reg);
        if (!$pendaftaran) {
            return redirect()->route('pendaftaran.index');
        }
    
        $pendaftaran->update([
            'no_rm' => $request->input('no_rm'),
        ]);
    
        return redirect('/pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_reg)
    {
        
        $pendaftaran = Pendaftarans::find($no_reg);

        if (!$pendaftaran) {
            return redirect()->route('pendaftaran.index');
        }

        $pendaftaran->delete();

        return redirect('/pendaftaran');
    }
}
