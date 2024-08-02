<?php

use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/jabatan', \App\Http\Controllers\JabaatanController::class);
Route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
Route::resource('/lokasi', \App\Http\Controllers\LokasiController::class);
