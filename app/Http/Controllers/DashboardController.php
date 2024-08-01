<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('dashboard.index', [
            'jml_pegawai' => $pegawai->count(),
        ]);
    }
}
