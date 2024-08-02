<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Satuan;
use App\Models\Lokasi;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $primaryKey = "id";

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'type',
        'tgl_beli',
        'satuan_id',
        'lokasi_id',
        'jumlah',
        'deskripsi',
        'kondisi',
        'foto',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
