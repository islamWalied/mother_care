<?php

use App\Http\Controllers\Admin\BabyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['admin','auth:sanctum'])->group(function (){
    Route::get('/baby',[BabyController::class,'index']);
    Route::get('/baby/{baby}',[BabyController::class,'show']);
    Route::post('/baby',[BabyController::class,'store']);
    Route::patch('/baby/{baby}',[BabyController::class,'update']);
    Route::delete('/baby/{baby}',[BabyController::class,'destroy']);
});

//Route::middleware(['auth:sanctum'])->group(function (){
//    Route::get('/baby',[\App\Http\Controllers\Auth\BabyController::class,'index']);
//    Route::get('/baby/{baby}',[\App\Http\Controllers\Auth\BabyController::class,'show']);
//    Route::post('/baby',[\App\Http\Controllers\Auth\BabyController::class,'store']);
//    Route::patch('/baby/{baby}',[\App\Http\Controllers\Auth\BabyController::class,'update']);
//    Route::delete('/baby/{baby}',[\App\Http\Controllers\Auth\BabyController::class,'delete']);
//});
