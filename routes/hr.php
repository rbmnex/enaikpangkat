<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Segment\Hr\Pinkform\PinkFormController;
use App\Http\Controllers\Segment\Pemangku\Tawaran\PemangkuTawaranController;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Segment\Kb\PengesahanPink\PengesahanPinkController;
use App\Http\Controllers\Segment\Kj\PengesahanBahagian\PengesahanBahagianController;
use App\Http\Controllers\Segment\Naikpangkat\NaikpangkatController;
use App\Http\Controllers\Urussetia\LpnkSoalanController;
use App\Http\Controllers\Segment\Penyelia\BoranglpnkController;

Route::middleware('auth')->group(function () {
    Route::prefix('/hr2')->group(function() {
        Route::prefix('/pinkform')->group(function() {
            Route::get('/',[PinkFormController::class,'index']);
            Route::get('/get-pink-form-list',[PinkFormController::class,'getPinkFormList']);
            Route::post('/hantar',[PinkFormController::class,'hantar']);
            Route::get('/download-pink/{id}',[PinkFormController::class,'display_pink']);
            Route::post('/resend',[PinkFormController::class,'resend']);
        });
    });

    Route::prefix('/kb')->group(function() {
        Route::prefix('/pengesahan-pink')->group(function() {
            Route::get('/',[PengesahanPinkController::class,'index']);
            Route::get('/get-pengesahan-pink-form-list',[PengesahanPinkController::class,'getPinkFormList']);
            Route::get('/update-pengesahan/{pemohon_id}',[PengesahanPinkController::class,'semakPinkForm']);
            Route::get('/preview/{pemohon_id}',[PengesahanPinkController::class,'preview_pdf']);
            Route::get('/setuju/{setuju}/{pemohon_id}',[PengesahanPinkController::class,'setuju']);
        });
    });

    Route::prefix('/kj')->group(function() {
        Route::prefix('/pengesahan-pink')->group(function() {
            Route::get('/',[PengesahanBahagianController::class,'index']);
            Route::get('/get-pengesahan-pink-form-list',[PengesahanBahagianController::class,'getPinkFormList']);
            Route::get('/update-pengesahan/{pemohon_id}',[PengesahanBahagianController::class,'semakPinkForm']);
            Route::get('/preview/{pemohon_id}',[PengesahanBahagianController::class,'preview_pdf']);
            Route::get('/setuju/{setuju}/{pemohon_id}',[PengesahanBahagianController::class,'setuju']);
        });
    });
});

Route::prefix('/pemangku')->group(function() {
    Route::prefix('/tawaran')->group(function() {
        Route::get('/',[PemangkuTawaranController::class,'index']);
        Route::get('/update/{id}',[PemangkuTawaranController::class,'updateTawaran'])->middleware(['auth']);
        Route::post('/update/process',[PemangkuTawaranController::class,'updateTawaranPost']);
        Route::get('/preview-pdf/{id}',[PemangkuTawaranController::class,'preview_pdf']);
        Route::post('update/upload',[PemangkuTawaranController::class,'upload_form']);
    });
});

Route::prefix('/naikpangkat')->group(function() {
    Route::prefix('/ukp13')->group(function() {
        Route::get('/',[NaikpangkatController::class,'index']);
        Route::get('/get-ukp13-list',[NaikpangkatController::class,'getUkp13List']);
        Route::get('/borang/{id_pemohonan}',[NaikpangkatController::class,'borang']);
        Route::get('/mohon/{id}',[NaikpangkatController::class,'mohon'])->middleware(['auth']);
        Route::get('/apply/{id}',[NaikpangkatController::class,'apply'])->middleware(['auth']);
        Route::post('/borang-submit',[NaikpangkatController::class,'submit_application']);
        Route::get('/download/part',[NaikpangkatController::class,'download_form_part']);
        Route::prefix('/api')->group(function() {
            Route::post('/upload',[NaikpangkatController::class,'upload_file']);
            Route::post('/normal-submit',[NaikpangkatController::class,'submit_normal']);
            Route::post('/preview-download',[NaikpangkatController::class,'save_for_preview']);
            Route::post('/save-work',[NaikpangkatController::class,'save_sasaran_kerja']);
            Route::post('/delete-work',[NaikpangkatController::class,'delete_sasaran_kerja']);
            Route::get('/load-work/{id}',[NaikpangkatController::class,'load_sasaran_kerja']);
        });
    });
});

Route::prefix('/bpsm')->group(function() {
    Route::prefix('/question')->group(function () {
        Route::get('/',[LpnkSoalanController::class,'index']);
        Route::get('/get-list',[LpnkSoalanController::class,'getList']);
        Route::post('/soalan-post',[LpnkSoalanController::class,'soalan_post']);
        Route::post('/get-soalan',[LpnkSoalanController::class,'get_soalan']);
        Route::get('/get-sub-list/{soalan_id}',[LpnkSoalanController::class,'getSubList']);
        Route::post('/sub-soalan-post',[LpnkSoalanController::class,'sub_soalan_post']);
        Route::post('/get-sub-soalan',[LpnkSoalanController::class,'get_sub_soalan']);
        Route::post('/delete-soalan-post',[LpnkSoalanController::class,'delete_soalan']);
        Route::post('/delete-sub-soalan-post',[LpnkSoalanController::class,'delete_sub_soalan']);
    });
});

Route::prefix('/penyelia')->group(function() {
    Route::prefix('/lpnk')->group(function () {
        Route::get('/',[BoranglpnkController::class,'index']);
        Route::get('/get-list',[BoranglpnkController::class,'getList']);
        Route::get('/borang/{pemohon_id}',[BoranglpnkController::class,'borang']);
        Route::post('/post-borang',[BoranglpnkController::class,'post_borang']);
    });
});

Route::prefix('/common')->group(function () {
    Route::get('/pengguna-carian', [CommonController::class, 'pengguna_carian']);
});

