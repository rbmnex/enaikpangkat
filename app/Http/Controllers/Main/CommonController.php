<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    //
    public function listing(Request $request)
    {
        $model = $request->input('model');
        $queryString = json_decode($request->input('queryString'));
        $data = [];

        if($model == 'Role'){
            $query = Role::all();

            foreach($query as $list){
                $data[] = array(
                    'label' => $list->display_name,
                    'value' => $list->id
                );
            }
        }

        return response()->json([
            'success' => 1,
            'data' => $data,
        ]);
    }
}
