<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;

    const STATUS_PROSES = 'Proses';
    const STATUS_SEDANG_DIPROSES = 'Sedang Proses';
    const STATUS_SELESAI = 'Selesai';

    protected $fillable = [
        'kode_pelapor',
        'nama_pelapor',
        'bidang',
        'deskripsi',
        'foto_bukti',
        'status_transaksi',
        'typeKomplain'
    ];

    public function setStatus($status)
    {
        $this->update(['status_transaksi' => $status]);
    }
}
