<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LGred extends Model
{
    use HasFactory;
    protected $table = "l_gred";
    protected $connection = 'pgsqlmykj';
}
