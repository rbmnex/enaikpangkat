<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    //
    public function func(Request $request) {
        $object1 = (object)[
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $object2 = (object)[
            'a' => NULL,
            'b' => NULL,
            'c' => NULL,
        ];

        $arr_obj1 = get_object_vars($object1);
        $arr_obj2 = get_object_vars($object2);

        $array_keys = array_keys($arr_obj2);
        foreach ($array_keys as $array_key) {
            $object2->$array_key = $arr_obj1[$array_key];
        }

        return json_encode($object2);

    }
}
