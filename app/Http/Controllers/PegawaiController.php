<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::orderBy('created_at', 'desc')->get();
        return view('pegawai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'npk' => 'required|unique:pegawais',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nohp' => 'required',
            'jabatan' => 'required',
            'tmt' => 'required|date',
            'foto' => 'nullable|file|image|max:2048'
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/pegawai', $foto->hashName());

        //create pegawai
        Pegawai::create([
            'npk' => $request->npk,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nohp' => $request->nohp,
            'jabatan' => $request->jabatan,
            'tmt' => $request->tmt,
            'foto' => $foto->hashName()
        ]);

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Pegawai Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get post by ID
        $data = Pegawai::findOrFail($id);

        //render view with post
        return view('pegawai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get post by ID
        $data = Pegawai::findOrFail($id);

        //render view with post
        return view('pegawai.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'npk' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nohp' => 'required',
            'jabatan' => 'required',
            'tmt' => 'required|date',
            'foto' => 'nullable|file|image|max:2048'
        ]);

        //get post by ID
        $data = Pegawai::findOrFail($id);

        if ($request->hasFile('foto')) {

            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/pegawai', $foto->hashName());

            //delete old image
            Storage::delete('public/pegawai/' . $data->foto);

            //update post with new image
            $data->update([
                'npk' => $request->npk,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nohp' => $request->nohp,
                'jabatan' => $request->jabatan,
                'tmt' => $request->tmt,
                'foto' => $foto->hashName()
            ]);
        } else {

            //update post without image
            $data->update([
                'npk' => $request->npk,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nohp' => $request->nohp,
                'jabatan' => $request->jabatan,
                'tmt' => $request->tmt
            ]);
        }
        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $data = Pegawai::findOrFail($id);

        //delete image
        Storage::delete('public/pegawai/' . $data->foto);
        // Storage::delete('public/pegawai/' . $data->foto);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
