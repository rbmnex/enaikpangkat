<?php

namespace App\Models\MyKj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = "pengalaman";
}
