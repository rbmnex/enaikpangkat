<?php

namespace App\Models;

class Helper
{
    public static function replaceOrCreate($model,$idArr = array(),$index,$idName = 'id') {
        if(array_key_exists($index, $idArr) ) {
            $model->$idName = $idArr[$index];
        }

        $model->save();
    }
}
