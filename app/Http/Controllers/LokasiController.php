<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $data = Lokasi::orderBy('created_at', 'desc')->get();
        return view('lokasi.index', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_lokasi' => 'required'
        ]);

        //create pegawai
        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        //redirect to index
        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_lokasi' => 'required'
        ]);

        //get post by ID
        $data = Lokasi::findOrFail($id);

        $data->update([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        //redirect to index
        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function destroy(string $id)
    {

        //get post by ID
        $data = Lokasi::findOrFail($id);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
