<?php

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


Route::post('/login',[\App\Http\Controllers\Auth\AuthController::class,'login']);
Route::post('/register',[\App\Http\Controllers\Auth\AuthController::class,'register']);

Route::middleware('auth:sanctum')
    ->group(function (){
        Route::get('/logout',[\App\Http\Controllers\Auth\AuthController::class,'logout']);
    });



