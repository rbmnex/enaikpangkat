<?php

namespace App\Models\Urussetia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LnptUkp12 extends Model
{
    use HasFactory;
    protected $table = "lnpt_ukp12";
    protected $connection = 'pgsql';
}
