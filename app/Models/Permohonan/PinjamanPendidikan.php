<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanPendidikan extends Model
{
    use HasFactory;
    protected $table = "pinjaman_pendidikan";
    protected $connection = 'pgsql';
}
