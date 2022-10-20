<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Segment\Hr\Pinkform\PinkFormController;
use App\Http\Controllers\Segment\Pemangku\Tawaran\PemangkuTawaranController;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Segment\Kb\PengesahanPink\PengesahanPinkController;

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
//            Route::get('/update/{id}',[PemangkuTawaranController::class,'updateTawaran']);
//            Route::post('/update/process',[PemangkuTawaranController::class,'updateTawaranPost']);
//            Route::get('/preview-pdf/{id}',[PemangkuTawaranController::class,'preview_pdf']);
        });
    });
});

Route::prefix('/common')->group(function () {
    Route::get('/pengguna-carian', [CommonController::class, 'pengguna_carian']);
});

