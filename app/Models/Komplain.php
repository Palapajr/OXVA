<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;

    const STATUS_PROSES = '1';
    const STATUS_SEDANG_DIPROSES = '2';
    const STATUS_SELESAI = '3';

    protected $fillable = [
        'nama_pelapor',
        'bidang',
        'deskripsi',
        'foto_bukti',
        'status_transaksi'
    ];

    public function setStatus($status)
    {
        $this->update(['status_transaksi' => $status]);
    }
}
