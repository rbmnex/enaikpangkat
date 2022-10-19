<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harta extends Model
{
    use HasFactory;
    protected $table = "harta";
    protected $connection = 'pgsql';
}
