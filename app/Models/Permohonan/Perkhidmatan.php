<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkhidmatan extends Model
{
    use HasFactory;
    protected $table = "perkhidmatan";
    protected $connection = 'pgsql';
}
