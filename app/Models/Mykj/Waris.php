<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waris extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
}
