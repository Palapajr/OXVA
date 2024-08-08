<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::orderBy('created_at', 'desc')->get();
        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuan = Satuan::all();
        $lokasi = Lokasi::all();
        return view('barang.create', compact('satuan', 'lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'nama_barang' => 'required',
            'type' => 'required',
            'tgl_beli' => 'required|date',
            'satuan_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kondisi' => 'required',
            'foto' => 'nullable|file|image|max:2048'
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto_filename = $foto->hashName();
        // $foto->storeAs('public/barang', $foto_filename);

        //create pegawai
        Barang::create([
            'kode_barang' => $this->generateKodeBarang(),
            'nama_barang' => $request->nama_barang,
            'type' => $request->type,
            'tgl_beli' => $request->tgl_beli,
            'satuan_id' => $request->satuan_id,
            'lokasi_id' => $request->lokasi_id,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'kondisi' => $request->kondisi,
            'foto' => $foto_filename
            // 'foto' => "foto.png"
        ]);

        $foto->storeAs('public/barang', $foto_filename);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Barang Berhasil Disimpan!']);
    }

    private function generateKodeBarang()
    {
        $latestBarang = Barang::orderBy('created_at', 'DESC')->first();
        if (!$latestBarang) {
            return 'SPRS-0001';
        }
        $latestKode = $latestBarang->kode_barang;
        $number = (int) substr($latestKode, -4);
        $number++;
        return 'SPRS-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function edit(string $id)
    {

        //get post by ID
        $data = Barang::with('satuan', 'lokasi')->findOrFail($id);
        $satuan = Satuan::all();
        $lokasi = Lokasi::all();

        //render view with post
        return view('barang.update', compact('data', 'satuan', 'lokasi'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'type' => 'required',
            'tgl_beli' => 'required|date',
            'satuan_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kondisi' => 'required',
            'foto' => 'nullable|file|image|max:2048'
        ]);

        $data = Barang::with('satuan', 'lokasi')->findOrFail($id);

        if ($request->hasFile('foto')) {

            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/barang', $foto->hashName());

            //delete old image
            Storage::delete('public/barang/' . $data->foto);

            $data->update([
                'nama_barang' => $request->nama_barang,
                'type' => $request->type,
                'tgl_beli' => $request->tgl_beli,
                'satuan_id' => $request->satuan_id,
                'lokasi_id' => $request->lokasi_id,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'kondisi' => $request->kondisi,
                'foto' => $foto->hashName()
            ]);
        } else {
            $data->update([
                'nama_barang' => $request->nama_barang,
                'type' => $request->type,
                'tgl_beli' => $request->tgl_beli,
                'satuan_id' => $request->satuan_id,
                'lokasi_id' => $request->lokasi_id,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'kondisi' => $request->kondisi
            ]);
        }
        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //get post by ID
        $data = Barang::findOrFail($id);

        //delete image
        Storage::delete('public/barang/' . $data->foto);
        // Storage::delete('public/pegawai/' . $data->foto);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
