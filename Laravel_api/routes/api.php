<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/student',[\App\Http\Controllers\StudentController::class,'index']);
    Route::post('/studentCreate',[\App\Http\Controllers\StudentController::class,'store']);
    Route::delete('/studentDelete/{id}',[\App\Http\Controllers\StudentController::class,'destroy']);
    Route::post('/studentUpdate/{id}',[\App\Http\Controllers\StudentController::class,'update']);
    Route::get('/student/{id}',[\App\Http\Controllers\StudentController::class,'show']);
    Route::post('/userCreate',[\App\Http\Controllers\UserContoller::class,'store']);
});

Route::post('/login',[\App\Http\Controllers\UserContoller::class,'login']);
