<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mykj\LPeristiwa;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peristiwa extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = 'peristiwa';
//  public $timestamps = false;

     public function LPeristiwa()
    {
        return $this->hasOne(LPeristiwa::class, 'kod_peristiwa','kod_peristiwa');
    }

     public function jenis() {
        return $this->belongsTo(LPeristiwa::class,'kod_peristiwa','kod_peristiwa');
    }
}
