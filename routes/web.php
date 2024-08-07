<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PegawaiController;
use \App\Http\Controllers\BarangController;
use \App\Http\Controllers\JabaatanController;
use App\Http\Controllers\KomplainController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/pegawai', PegawaiController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/jabatan', JabaatanController::class);
Route::resource('/satuan', SatuanController::class);
Route::resource('/lokasi', LokasiController::class);
Route::resource('/pemeliharaan', PemeliharaanController::class);


Route::get('/komplain', [KomplainController::class, 'index']);
// Route::resource('/komplain', KomplainController::class);
