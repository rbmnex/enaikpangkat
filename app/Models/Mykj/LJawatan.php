<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LJawatan extends Model
{
    use HasFactory;
    protected $table = "l_jawatan";
    protected $connection = 'pgsqlmykj';
}
