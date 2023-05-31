<?php

use App\Models\Permohonan\Pemohon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get("/api/resend/reject/{nokp}",function($nokp) {
    $user = User::where('nokp',$nokp)->first();
    if($user) {
        $pemohon = Pemohon::with('pemohonPeribadi','pemohonPermohonan')->where('user_id',$user->id)->first();
        if($pemohon) {
            $content = [
                'gred' => $pemohon->gred,
                'jawatan' => $pemohon->jawatan,
                'nokp' => $pemohon->pemohonPeribadi->nokp,
                'nama' => $pemohon->pemohonPeribadi->nama,
                'reason' => $pemohon->alasan,
                'naik_gred' => $pemohon->pemohonPermohonan->gred,
                'alamat' => $pemohon->alamat_pejabat,
                'tarikh' => \Carbon\Carbon::parse($pemohon->created_at)->format('d-m-Y')
            ];
            try {
                Mail::mailer('smtp')->send('mail.tolak_tawaran-mail',$content,function($message) {
                    // testing purpose
                    //$message->to('rubmin@mantasoft.com.my','Urus Setia Kenaik Pangkat');
                    //$message->to('munirahj@jkr.gov.my','Urus Setia Kenaik Pangkat');
                    $message->to('urusetiakenaikanpangkat@jkr.gov.my','Urus Setia Kenaik Pangkat');

                    $message->subject('MENOLAK TAWARAN PEMANGKUAN');

                });
                return response()->json([
                    'success' => 0,
                    'message' => "email successfully send!!!"
                ]);
            } catch(\Exception $e) {
                return response()->json([
                    'success' => 0,
                    'message' => "Failed to resend email!!!"
                ]);
            }
        } else {
            return response()->json([
                'success' => 0,
                'message' => "User Application not found!!!"
            ]);
        }

    } else {
        return response()->json([
            'success' => 0,
            'message' => "User not found!!!"
        ]);
    }

});
