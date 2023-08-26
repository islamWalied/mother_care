<?php

use App\Http\Controllers\Admin\UserController;
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

   Route::get('/mother',[UserController::class,'index']);
   Route::get('/mother/{mother}',[UserController::class,'show']);
   Route::post('/mother',[UserController::class,'store']);
   Route::patch('/mother/{mother}',[UserController::class,'update']);
   Route::delete('/mother/{mother}',[UserController::class,'delete']);
});
