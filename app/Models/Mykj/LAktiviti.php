<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LAktiviti extends Model
{
    use HasFactory;
    protected $table = "l_aktiviti";
    protected $connection = 'pgsqlmykj';
}
