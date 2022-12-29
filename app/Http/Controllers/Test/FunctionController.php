<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Profail\Penempatan;
use App\Models\Profail\Peribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;

class FunctionController extends Controller
{
    //
    public function func(Request $request) {
        // $object1 = (object)[
        //     'a' => 1,
        //     'b' => 2,
        //     'c' => 3,
        // ];

        // $object2 = new stdClass;

        // $arr_obj1 = get_object_vars($object1);
        //$arr_obj2 = get_object_vars($object2);

        // $array_keys = array_keys($arr_obj1);
        // foreach ($array_keys as $array_key) {
        //     $object2->$array_key = $arr_obj1[$array_key];
        // }

        $user_id = $request->input('userid');
        $nokp = $request->input('nokp');

        $mykjPeribadi = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

                $arr_info = get_object_vars($mykjPeribadi);
                $array_keys = array_keys($arr_info);
                $model = new Peribadi;
                foreach ($array_keys as $array_key) {
                    if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                        // skip and continue
                    } else {
                        $model->$array_key = $arr_info[$array_key];
                    }
                }
                $model->users_id = $user_id;
                $model->flag = 1;
                $model->delete_id = 0;
                $model->created_by = 'MYKJ';
                $model->updated_by = 'MYKJ';
                 if($model->save()) {
                     Penempatan::create($model->id,$arr_info['nokp']);
                 }

         return json_encode($model);

    }

    public function req(Request $request) {
        return response()->json([
            'success' => 1,
            'data' => []
        ]);
    }

    public function mail(Request $request) {
        $to_addr = $request->input('to');
        $subject = $request->input('subject');
        $message = $request->input('msg');

        $data = [
            'subject' => $subject,
            'email' => $to_addr,
            'content' => $message
          ];

        Mail::mailer('postmark')->send('mail.test-mail', $data, function ($message) use ($data){

            $message->to($data['email']);

            $message->subject($data['content']);

        });

        return 1;
    }

    public function upload(Request $request) {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        return response()->json([
            'data' => [
                'base64' => base64_encode(file_get_contents($file)),
                'ext' => $extension
            ]
        ]);
    }

    public function uploadUrl(Request $request) {
        $url = $request->input('url');
        $file_info = array();
        $urlParts = pathinfo($url);
        $modifyUrl = preg_replace('/\s+/', '%20', $url);
        $image = file_get_contents($modifyUrl);

        return response()->json([
            'data' => [
                'base64' => base64_encode(file_get_contents($modifyUrl)),
                'ext' => $urlParts['extension'],
                'image' => $image
            ]
        ]);
    }

    public function download(Request $request) {
        $base64 = $request->input('base64');
        $extension = $request->input('ext');

        $filename = 'example.'.$extension;


        $path       = public_path().'/files/'.$filename;
        $contents   = base64_decode($base64);

        //store file temporarily
        file_put_contents($path, $contents);

        // Storage::disk('public')->put($filename, $contents);

        // $path = Storage::url($filename);

        //download file and delete it
        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function pdf(Request $request) {
        $pdf = PDF::loadView('pdf.ukp12');
        //return $pdf->download('test_pdf.pdf');
        return $pdf->stream();
    }

    public function encrypt(Request $request) {
        $encrypt = Crypt::encryptString($request->input('input'));
        return $encrypt;
    }

    public function decrypt(Request $request) {
        $decrypted = '';
        try {
            $decrypted = Crypt::decryptString($request->input('input'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

        };
        return $decrypted;
    }

    public function downloadBase64($id) {
        $file = File::find($id);
        if($file) {
            return 'data:image/'.$file->ext.';base64,'.$file->content_bytes;
        } else {
            return 'Empty File lol !!!';
        }
    }
}
