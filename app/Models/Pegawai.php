<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    use HasFactory;
    protected $fillable = [
        'npk',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'nohp',
        'jabatan',
        'tmt',
        'foto',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
