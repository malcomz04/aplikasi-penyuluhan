<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use Uuid;

    protected $fillable = [
        'kode_tanaman', 'nama_tanaman', 'stok', 'satuan', 'harga',
    ];
}
