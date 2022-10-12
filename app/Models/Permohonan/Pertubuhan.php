<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertubuhan extends Model
{
    use HasFactory;
    protected $table = "pertubuhan";
    protected $connection = 'pgsql';
}
