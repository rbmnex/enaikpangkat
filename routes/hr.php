<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Segment\Hr\Pinkform\PinkFormController;
use App\Http\Controllers\Segment\Pemangku\Tawaran\PemangkuTawaranController;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Segment\Kb\PengesahanPink\PengesahanPinkController;
use App\Http\Controllers\Segment\Kj\PengesahanBahagian\PengesahanBahagianController;

Route::middleware('auth')->group(function () {
    Route::prefix('/hr2')->group(function() {
        Route::prefix('/pinkform')->group(function() {
            Route::get('/',[PinkFormController::class,'index']);
            Route::get('/get-pink-form-list',[PinkFormController::class,'getPinkFormList']);
            Route::post('/hantar',[PinkFormController::class,'hantar']);
        });
    });

    Route::prefix('/pemangku')->group(function() {
        Route::prefix('/tawaran')->group(function() {
            Route::get('/',[PemangkuTawaranController::class,'index']);
            Route::get('/update/{id}',[PemangkuTawaranController::class,'updateTawaran']);
            Route::post('/update/process',[PemangkuTawaranController::class,'updateTawaranPost']);
            Route::get('/preview-pdf/{id}',[PemangkuTawaranController::class,'preview_pdf']);
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

Route::prefix('/common')->group(function () {
    Route::get('/pengguna-carian', [CommonController::class, 'pengguna_carian']);
});

