<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pembelian_bahan extends Model
{
    use Uuid;

    protected $fillable = [
        'kode_pembelian', 'bahan_id', 'jumlah', 'satuan', 'tanggal',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }

}
