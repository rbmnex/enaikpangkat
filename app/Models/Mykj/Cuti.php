<?php

namespace App\Models\MyKj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = "cuti";
}
