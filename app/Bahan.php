<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use Uuid;

    protected $fillable = [
        'kode_bahan', 'nama_bahan', 'stok', 'satuan', 'kategori',
    ];
}
