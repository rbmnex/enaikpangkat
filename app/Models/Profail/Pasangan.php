<?php

namespace App\Models\Profail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;
    protected $table = "pasangan";
    protected $connection = 'pgsql';
}
