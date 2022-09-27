<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LAgama extends Model
{
    use HasFactory;
    protected $table = "l_agama";
    protected $connection = 'pgsqlmykj';
}
