<?php

namespace App\Models\Pink;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pink\LampiranBebanKerja;

class Resume extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'resume';
//    public $timestamps = false;

    public function getLampiran(){
        return $this->hasOne(LampiranBebanKerja::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }

    public function getIsytiharHarta(){
        return $this->hasOne(LampiranIstiharHarta::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }
}
