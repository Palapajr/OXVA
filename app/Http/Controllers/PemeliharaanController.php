<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pegawai;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemeliharaan::orderBy('created_at', 'desc')->get();
        return view('pemeliharaan.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $barang = Barang::all();
        $lokasi = Lokasi::all();
        $pegawai = Pegawai::all();
        return view('pemeliharaan.create', compact('barang', 'lokasi', 'pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tgl_perbaikan' => 'required|date',
            'jam_perbaikan' => 'required',
            'lokasi_id' => 'required|exists:lokasis,id',
            'deskripsi' => 'required|string',
            'pegawai_id' => 'required|exists:pegawais,id',
        ]);

        Pemeliharaan::create($request->all());

        return redirect()->route('pemeliharaan.index')->with('success', 'Pemeliharaan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $data = Pemeliharaan::with('barang', 'Lokasi', 'lokasi', 'pegawai')->findOrFail($id);
        $barang = Barang::all();
        $lokasi = Lokasi::all();
        $pegawai = Pegawai::all();

        //render view with post
        return view('pemeliharaan.update', compact('data', 'barang', 'lokasi', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'barang_id' => 'required|exists:barangs,id',
            'tgl_perbaikan' => 'required|date',
            'jam_perbaikan' => 'required',
            'lokasi_id' => 'required|exists:lokasis,id',
            'deskripsi' => 'required|string',
            'pegawai_id' => 'required|exists:pegawais,id',
        ]);

        //get post by ID
        $data = Pemeliharaan::findOrFail($id);

        $data->update([
            'barang_id' => $request->barang_id,
            'tgl_perbaikan' => $request->tgl_perbaikan,
            'jam_perbaikan' => $request->jam_perbaikan,
            'lokasi_id' => $request->lokasi_id,
            'deskripsi' => $request->deskripsi,
            'pegawai_id' => $request->pegawai_id
        ]);

        //redirect to index
        return redirect()->route('pemeliharaan.index')->with('success', 'Pemeliharaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get post by ID
        $data = Pemeliharaan::findOrFail($id);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('pemeliharaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function close($id)
    {
    $pemeliharaan = Pemeliharaan::findOrFail($id);

    if ($pemeliharaan->status == 'Waiting') {
        $pemeliharaan->status = 'Closed';
        $pemeliharaan->save();

        return redirect()->route('pemeliharaan.index')->with('success', 'Status berhasil diubah menjadi Closed.');
    }

    return redirect()->route('pemeliharaan.index')->with('error', 'Perubahan status gagal, status saat ini bukan Waiting.');
    }
}
