<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::orderBy('created_at', 'desc')->get();
        return view('satuan.index', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_satuan' => 'required'
        ]);

        //create pegawai
        Satuan::create([
            'nama_satuan' => $request->nama_satuan,
        ]);

        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_satuan' => 'required'
        ]);

        //get post by ID
        $data = Satuan::findOrFail($id);

        $data->update([
            'nama_satuan' => $request->nama_satuan,
        ]);

        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function destroy(string $id)
    {

        //get post by ID
        $data = Satuan::findOrFail($id);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
