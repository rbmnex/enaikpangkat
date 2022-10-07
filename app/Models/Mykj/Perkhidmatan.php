<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mykj\LTarafPerkhidmatan;
use App\Models\Mykj\LKumpulan;

class Perkhidmatan extends Model
{

    protected $connection = 'pgsqlmykj';
    protected $table = 'perkhidmatan';
//  public $timestamps = false;

    public function PerkhidmatanTaraf()
    {
        return $this->hasOne(LTarafPerkhidmatan::class, 'taraf_perkhidmatan','taraf_perkhidmatan');
    }

     public function LKumpulan()
    {
        return $this->hasOne(LKumpulan::class, 'kod_kumpulan','kod_kumpulan');
    }
}
