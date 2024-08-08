<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KomplainController extends Controller
{
    public function createUser()
    {
        return view('index');
    }

    public function storeuser(Request $request): RedirectResponse
    {

        $request->validate([
            'nama_pelapor' => 'required',
            'bidang' => 'required',
            'deskripsi' => 'required',
            'foto_bukti' => 'image|nullable|max:2024',
            'typeKomplain' => 'required'
            // 'status_transaksi' => 'required'
        ]);

        if ($request->hasFile('foto_bukti')) {
            $filenameWithExt = $request->file('foto_bukti')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_bukti')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('foto_bukti')->storeAs('public/komplain', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $typeKomplain = $request->input('typeKomplain');
        $kode_laporan = $this->generateComplaintCode($typeKomplain);

        Komplain::create([
            'kode_pelapor' => $kode_laporan,
            'nama_pelapor' => $request->input('nama_pelapor'),
            'bidang' => $request->input('bidang'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_bukti' => $fileNameToStore,
            'typeKomplain' => $request->input('typeKomplain'),
            // 'status_transaksi' => $request->input('status_transaksi'),
        ]);

        return redirect()->route('komplain.createUser')->with('success', 'KOMPLAIN ANDA SUDAH DILAPORKAN.');
    }

    private function generateComplaintCode($typeKomplain)
    {
        // Validasi kategori
        $validCategories = ['SAR', 'IT', 'ATM'];
        if (!in_array($typeKomplain, $validCategories)) {
            throw new \Exception("Invalid category.");
        }

        // Mulai transaksi untuk mengunci tabel dan menghindari race conditions
        DB::beginTransaction();
        try {
            // Hitung jumlah komplain berdasarkan kategori
            $complaintCount = Komplain::where('typeKomplain', $typeKomplain)
                ->lockForUpdate()
                ->count();

            // Tingkatkan jumlah untuk mendapatkan kode baru
            $number = $complaintCount + 1;

            // Format kode baru
            $newCode = $typeKomplain . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);

            DB::commit();
            return $newCode;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function index()
    {
        $komplains = Komplain::all();
        return view('komplain.index', compact('komplains'));
    }

    public function indexProses()
    {
        // Ambil semua komplain dengan status 'proses'
        $complaints = Komplain::where('status_transaksi', 'Proses')->get();

        // Kirim data ke view
        return view('komplain.proses', compact('complaints'))->with('status', 'Proses');
    }

    public function indexSedangProses()
    {
        $complaints = Komplain::where('status_transaksi', 'Sedang Proses')->get();
        return view('komplain.sedangproses', compact('complaints'))->with('status', 'Sedang Proses');
    }

    public function indexSelesai()
    {
        $complaints = Komplain::where('status_transaksi', 'Selesai')->get();
        return view('komplain.selesai', compact('complaints'))->with('status', 'Selesai');
    }

    // public function indexProses()
    // {
    //     // Ambil semua komplain berdasarkan kategori
    //     $sarprasComplaints = Komplain::where('typeKomplain', 'Sar')->where('status_transaksi', 'Proses')->get();
    //     $itComplaints = Komplain::where('typeKomplain', 'IT')->where('status_transaksi', 'Proses')->get();
    //     $atmComplaints = Komplain::where('typeKomplain', 'ATM')->where('status_transaksi', 'Proses')->get();

    //     return view('komplain.proses', compact('sarprasComplaints', 'itComplaints', 'atmComplaints'));
    // }
    // public function create()
    // {
    //     return view('komplain.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_pelapor' => 'required',
    //         'bidang' => 'required',
    //         'deskripsi' => 'required',
    //         'foto_bukti' => 'image|nullable|max:1999'
    //         // 'status_transaksi' => 'required'
    //     ]);

    //     if ($request->hasFile('foto_bukti')) {
    //         $filenameWithExt = $request->file('foto_bukti')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('foto_bukti')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('foto_bukti')->storeAs('public/komplain', $fileNameToStore);
    //     } else {
    //         $fileNameToStore = 'noimage.jpg';
    //     }

    //     Komplain::create([
    //         'nama_pelapor' => $request->input('nama_pelapor'),
    //         'bidang' => $request->input('bidang'),
    //         'deskripsi' => $request->input('deskripsi'),
    //         'foto_bukti' => $fileNameToStore,
    //         // 'status_transaksi' => $request->input('status_transaksi'),
    //     ]);

    //     return redirect()->route('komplain.index')->with('success', 'Komplain created successfully.');
    // }

    public function show($id)
    {
        $komplain = Komplain::findOrFail($id);
        return view('komplain.show', compact('komplain'));
    }

    // public function edit($id)
    // {
    //     $komplain = Komplain::findOrFail($id);
    //     return view('komplain.edit', compact('komplain'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_pelapor' => 'required',
    //         'bidang' => 'required',
    //         'deskripsi' => 'required',
    //         'foto_bukti' => 'image|nullable|max:1999',
    //         'status_transaksi' => 'required'
    //     ]);

    //     $komplain = Komplain::findOrFail($id);

    //     if ($request->hasFile('foto_bukti')) {
    //         $filenameWithExt = $request->file('foto_bukti')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('foto_bukti')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('foto_bukti')->storeAs('public/komplain', $fileNameToStore);
    //     } else {
    //         $fileNameToStore = $komplain->foto_bukti;
    //     }

    //     $komplain->update([
    //         'nama_pelapor' => $request->input('nama_pelapor'),
    //         'bidang' => $request->input('bidang'),
    //         'deskripsi' => $request->input('deskripsi'),
    //         'foto_bukti' => $fileNameToStore,
    //         'status_transaksi' => $request->input('status_transaksi'),
    //     ]);

    //     return redirect()->route('komplain.index')->with('success', 'Komplain updated successfully.');
    // }

    public function destroy($id)
    {
        $komplain = Komplain::findOrFail($id);
        if ($komplain->foto_bukti != 'noimage.jpg') {
            Storage::delete('public/komplain/' . $komplain->foto_bukti);
        }
        $komplain->delete();
        return redirect()->route('komplain.index')->with('success', 'Komplain deleted successfully.');
    }
    // public function editSedangDiproses($id)
    // {
    //     $komplain = Komplain::findOrFail($id);
    //     return view('komplain.edit-sedang-diproses', compact('komplain'));
    // }

    public function updateSedangDiproses(Request $request, $id)
    {
        $komplain = Komplain::findOrFail($id);
        $komplain->setStatus(Komplain::STATUS_SEDANG_DIPROSES);
        return redirect()->route('komplain.indexSedangProses', $id)->with('success', 'Status updated to "Sedang diproses".');
    }

    // public function editSelesai($id)
    // {
    //     $komplain = Komplain::findOrFail($id);
    //     return view('komplain.edit-selesai', compact('komplain'));
    // }

    public function updateSelesai(Request $request, $id)
    {
        $komplain = Komplain::findOrFail($id);
        $komplain->setStatus(Komplain::STATUS_SELESAI);
        return redirect()->route('komplain.indexSelesai', $id)->with('success', 'Status updated to "Selesai".');
    }
}
