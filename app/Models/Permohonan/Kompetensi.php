<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory;
    protected $table = "sijil_kompeten";
    protected $connection = 'pgsql';
}
