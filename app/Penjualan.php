<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use Uuid;

    protected $fillable = [
        'kode_penjualan', 'jumlah', 'tanggal', 'tanaman_id',
    ];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}
