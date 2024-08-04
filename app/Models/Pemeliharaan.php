<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pegawai;

class Pemeliharaan extends Model
{
    use HasFactory;
    protected $table = "pemeliharaans";
    protected $primaryKey = "id";

    protected $fillable = [
        'barang_id',
        'tgl_perbaikan',
        'jam_perbaikan',
        'lokasi_id',
        'deskripsi',
        'pegawai_id',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
