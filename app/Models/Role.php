<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    protected $connection = 'pgsql';

    public static function user_roles_list($userid) {
        $list = DB::connection('pgsql')->table('role_user')->select('role_id')->where('user_id',$userid)->get();

        return $list->all();
    }
}
