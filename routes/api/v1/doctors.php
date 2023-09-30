<?php

use App\Http\Controllers\DoctorController;
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
    Route::post('/doctor',[DoctorController::class,'store']);
    Route::patch('/doctor/{doctor}',[DoctorController::class,'update']);
    Route::delete('/doctor/{doctor}',[DoctorController::class,'destroy']);
});

Route::get('/doctor',[DoctorController::class,'index']);
Route::get('/doctor/{doctor}',[DoctorController::class,'show']);
