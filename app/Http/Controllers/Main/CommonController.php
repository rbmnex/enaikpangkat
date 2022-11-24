<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Mykj\LGred;
use App\Models\Mykj\LJawatan;
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
            $query = LJurusan::whereNotIn('kod_jurusan',['ET','JU','L','PU','T'])->get();
            foreach($query as $list){
                $data[] = array(
                    'label' => $list->jurusan,
                    'value' => $list->kod_jurusan
                );
            }
        } else if($model == 'Gred') {
            $query = LGred::whereIn('kod_gred',['J41','J44','J48','J52','J54'])->get();
            foreach($query as $list){
                $data[] = array(
                    'label' => $list->kod_gred,
                    'value' => $list->kod_gred
                );
            }
        } else if($model == 'Jawatan') {
            $query = LJawatan::all();
            foreach($query as $list){
                $data[] = array(
                    'label' => $list->jawatan,
                    'value' => $list->kod_jawatan
                );
            }
        }

        return response()->json([
            'success' => 1,
            'data' => $data,
        ]);
    }

    public function load_pegawai_info(Request $request) {

    }

    public function download_by_id(Request $request) {
        $file_id = $request->input('fileid');
        $file = File::find($file_id);
        $filename = $file->filename;

        $path       = public_path().'/files/'.$filename;
        $contents   = base64_decode($file->content_bytes);
        file_put_contents($path, $contents);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
