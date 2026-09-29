<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    use HasFactory;

    protected $table = 'kelompok_tani';

    /**
     * Kolom yang boleh diisi (mass assignment)
     * SEMUA sesuai dengan tabel database Anda.
     */
    protected $fillable = [
        'user_id',
        'kecamatan',
        'no_kk',
        'nik',
        'nama',
        'alamat',
        'no_telepon',
        'luas_lahan',
        'jenis_lahan',
        'komoditas_tanam',
        'periode_tanam',
        'kebutuhan_pupuk',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}