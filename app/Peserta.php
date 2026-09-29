<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use Uuid;

    protected $fillable = [
        'kecamatan_id', 'pelatihan_id', 'no_spt', 'tgl_spt',
        'nama_peserta', 'NIK', 'jk', 'tempat_lahir', 'tgl_lahir',
        'status', 'alamat',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }

}
