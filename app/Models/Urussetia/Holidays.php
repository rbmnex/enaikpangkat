<?php

namespace App\Models\Urussetia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Holidays extends Model
{
	use HasFactory;
    protected $table = "holidays";
    protected $connection = 'pgsql';

}
