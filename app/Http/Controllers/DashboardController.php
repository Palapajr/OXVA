<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Komplain;
use App\Models\Pegawai;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        $pemeliharaan = Pemeliharaan::all();
        $proses = Komplain::where('status_transaksi', 'Proses');
        $sedangproses = Komplain::where('status_transaksi', 'Sedang Proses');
        $selesai = Komplain::where('status_transaksi', 'Selesai');
        return view('dashboard.index', [
            'jml_pegawai' => $pegawai->count(),
            'jml_barang' => $barang->count(),
            'jml_pemeliharaan' => $pemeliharaan->count(),
            'proses' => $proses->count(),
            'sedangproses' => $sedangproses->count(),
            'selesai' => $selesai->count(),
        ]);
    }
}
