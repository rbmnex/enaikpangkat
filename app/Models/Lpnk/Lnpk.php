<?php

namespace App\Models\Lpnk;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnpk extends Model
{
    use HasFactory;
    public $table = 'lnpk';

    public function file() {
        return $this->hasOne(File::class, 'id', 'fail_skt');
    }
}
