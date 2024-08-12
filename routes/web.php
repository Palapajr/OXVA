<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PegawaiController;
use \App\Http\Controllers\BarangController;
use \App\Http\Controllers\JabaatanController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\SatuanController;
use  \App\Http\Controllers\LokasiController;
use \App\Http\Controllers\PemeliharaanController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/proseslogin', [LoginController::class, 'proseslogin',])->name('proseslogin');

// Routes untuk User
Route::get('/', [KomplainController::class, 'createUser'])->name('komplain.createUser');
Route::post('/komplain/storeuser', [KomplainController::class, 'storeuser'])->name('komplain.storeuser');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('/jabatan', JabaatanController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/pemeliharaan', PemeliharaanController::class);
    Route::post('pemeliharaan/{id}/close', [PemeliharaanController::class, 'close'])->name('pemeliharaan.close');

    Route::get('/komplain', [KomplainController::class, 'index'])->name('komplain.index');
    Route::get('/komplain/proses', [KomplainController::class, 'indexProses'])->name('komplain.indexProses');
    Route::get('/komplain/sedang-proses', [KomplainController::class, 'indexSedangProses'])->name('komplain.indexSedangProses');
    Route::get('/komplain/selesai', [KomplainController::class, 'indexSelesai'])->name('komplain.indexSelesai');
    Route::delete('komplain/{id}', [KomplainController::class, 'destroy'])->name('komplain.destroy');

    Route::post('/komplain/{id}/sedang-diproses', [KomplainController::class, 'updateSedangDiproses'])->name('komplain.updateSedangDiproses');
    Route::post('/komplain/{id}/selesai', [KomplainController::class, 'updateSelesai'])->name('komplain.updateSelesai');


    Route::get('/logout', [LoginController::class, 'logout',])->name('logout');
});






