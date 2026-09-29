<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Modul_pelatihan extends Model
{

    use Uuid;

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
