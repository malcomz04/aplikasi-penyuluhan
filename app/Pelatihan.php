<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use Uuid;


    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
} 
