<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JabaatanController extends Controller
{

    public function index()
    {
        $data = Jabatan::orderBy('created_at', 'desc')->get();
        return view('jabatan.index', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_jabatan' => 'required'
        ]);

        //create pegawai
        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        //redirect to index
        return redirect()->route('jabatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_jabatan' => 'required'
        ]);

        //get post by ID
        $data = Jabatan::findOrFail($id);

        $data->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        //redirect to index
        return redirect()->route('jabatan.index')->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function destroy(string $id)
    {

        //get post by ID
        $data = Jabatan::findOrFail($id);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('jabatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
