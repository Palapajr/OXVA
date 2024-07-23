<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{

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
}
