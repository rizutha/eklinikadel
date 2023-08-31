<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController;
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

Route::get('/pasien', 'App\Http\Controllers\PasienController@index')->name('pasien.index');
Route::get('/pasien/create', 'App\Http\Controllers\PasienController@create')->name('pasien.create');
Route::post('/pasien/create', 'App\Http\Controllers\PasienController@store')->name('pasien.store');
Route::get('/pasien/{id}/edit', 'App\Http\Controllers\PasienController@edit')->name('pasien.edit');
Route::put('/pasien/{id}', 'App\Http\Controllers\PasienController@update')->name('pasien.update');
Route::delete('/pasien/{id}', 'App\Http\Controllers\PasienController@destroy')->name('pasien.destroy');

Route::get('/dokter', function() {
    return view('dokter');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
