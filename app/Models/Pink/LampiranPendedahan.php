<?php

namespace App\Models\Pink;

use Illuminate\Database\Eloquent\Model;

class LampiranPendedahan extends Model
{
    protected $table = 'lampiran_pendedahan';
//    public $timestamps = false;

    public function LKategori()
    {
        return $this->hasOne(LKategori::class, 'kod_kategori','kod_kategori');
    }
}


