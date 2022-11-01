<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiktirafan extends Model
{
    use HasFactory;
    protected $table = "pengiktirafan";
    protected $connection = 'pgsql';
}
