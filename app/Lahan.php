<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use Uuid;

    protected $fillable = [
        'kode_lahan', 'luas_lahan', 'satuan', 'lokasi',
    ]; 

    public function penanaman()
    {
        return $this->hasMany(Penanaman::class);
    }

}
