<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mykj\LPeristiwa;

class Peristiwa extends Model
{

    protected $connection = 'pgsqlmykj';
    protected $table = 'peristiwa';
//  public $timestamps = false;

     public function LPeristiwa()
    {
        return $this->hasOne(LPeristiwa::class, 'kod_peristiwa','kod_peristiwa');
    }
}
