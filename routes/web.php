<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BungkusController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DetailObatController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/default', function() {
    return view('templates.default');
});



Route::middleware(['auth','admin', 'verified'])->group(function () {
    // pedaftaran pasien

    Route::get('/pendaftaran_pasien', [LandingController::class, 'pendaftaranPasien']);

    Route::get('/data_pasien', [DataPasienController::class, 'index']);
    Route::get('/data_pasien/create', [DataPasienController::class, 'create']);
    Route::post('/data_pasien/store', [DataPasienController::class, 'store']);
    Route::get('/data_pasien/{no_rm}/edit', [DataPasienController::class, 'edit']);
    Route::put('/data_pasien/{no_rm}', [DataPasienController::class, 'update']);
    Route::delete('/data_pasien/{no_rm}', [DataPasienController::class, 'destroy']);

    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create']);
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'store']);
    Route::get('/pendaftaran/{no_rm}/edit', [PendaftaranController::class, 'edit']);
    Route::get('/pendaftaran/{no_reg}/detail', [PendaftaranController::class, 'show']);
    Route::put('/pendaftaran/{no_rm}', [PendaftaranController::class, 'update']);
    Route::delete('/pendaftaran/{no_rm}', [PendaftaranController::class, 'destroy']);



    // pelayanan rawat jalan

    Route::get('/pelayanan_rawat_jalan', [LandingController::class, 'pelayananRawatJalan']);
    // poli
    Route::get('/poli', [PoliController::class, 'index']);
    // dokter
    Route::get('/rawatjalan', [RawatJalanController::class, 'index']);
    // tindakan
    Route::get('/tindakan', [TindakanController::class, 'index']);

   // Apotek

   Route::get('/apotek', [LandingController::class, 'Apotek']);

   // obat
   Route::get('/obat', [ObatController::class, 'index']);
   // produsen
   Route::get('/produsen', [ProdusenController::class, 'index']);
   // bungkus
   Route::get('/bungkus', [BungkusController::class, 'index']);
   // detail obat
   Route::get('/detail_obat', [DetailObatController::class, 'index']);
   // batch
   Route::get('/batch', [BatchController::class, 'index']);
   // satuan
   Route::get('/satuan', [SatuanController::class, 'index']);



    // Aplikasi kasir

    Route::get('/kasirs', [LandingController::class, 'kasir']);
    // kasir
    Route::get('/kasir', [KasirController::class, 'index']);
    // transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    // detail obat
    Route::get('/detail_transaksi', [DetailTransaksiController::class, 'index']);





    // daftar
    Route::get('/daftar', [DaftarController::class, 'index']);

    // dokter
    Route::get('/dokter', [DokterController::class, 'index']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pasien', 'App\Http\Controllers\PasienController@index')->name('pasien.index');
    Route::get('/apotek', [ApotekController::class, 'index']);
    Route::get('/daftar', [DaftarController::class, 'index']);
    Route::get('/dokter', function() {
        return view('dokter');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
