<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peristiwa extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = 'peristiwa';

    public function jenis() {
        return $this->belongsTo(LPeristiwa::class,'kod_peristiwa','kod_peristiwa');
    }
}
