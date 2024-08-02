<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;


class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuans';
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'nama_satuan',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
