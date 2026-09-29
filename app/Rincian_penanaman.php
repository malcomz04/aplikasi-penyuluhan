<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Rincian_penanaman extends Model
{
    use Uuid;

    protected $fillable = [
        'jumlah', 'tanggal', 'bahan_id', 'penanaman_id',
    ];

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}
