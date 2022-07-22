<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Mykj\LGred;
use App\Models\Mykj\LJurusan;
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
        } else if($model == 'Jurusan') {
            $query = LJurusan::all();
            foreach($query as $list){
                $data[] = array(
                    'label' => $list->jurusan,
                    'value' => $list->kod_jurusan
                );
            }
        } else if($model == 'Gred') {
            $query = LGred::all();
            foreach($query as $list){
                $data[] = array(
                    'label' => $list->kod_gred,
                    'value' => $list->kod_gred
                );
            }
        }

        return response()->json([
            'success' => 1,
            'data' => $data,
        ]);
    }
}
