<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mykj\LAktiviti;

class PengalamanPengkhususan extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = "pengalaman";


 public function LAktiviti()
    {
        return $this->hasOne(LAktiviti::class, 'kod_aktiviti','kod_aktiviti');
    }
}