<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $table = 'role_user';
    protected $connection = 'pgsql';
    public $timestamps = false;

    public static function removeAll($userId) {
        RoleUser::where('user_id',$userId)->delete();
    }
}
