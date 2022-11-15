<?php

namespace App\Models\Lpnk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LpnkParent extends Model
{
    use HasFactory;

    public function getChild(){
        return $this->hasMany(LpnkChild::class, 'lpnk_parents_id', 'id')->where('delete_id', 0);
    }
}
