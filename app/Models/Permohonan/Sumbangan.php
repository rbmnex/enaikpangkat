<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    use HasFactory;
    protected $table = "sumbangan";
    protected $connection = 'pgsql';
}
