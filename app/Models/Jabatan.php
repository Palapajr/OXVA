<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_jabatan',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
