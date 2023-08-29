<?php

use App\Http\Controllers\Admin\TipsController;
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

   Route::post('/tips',[TipsController::class,'store']);
   Route::patch('/tips/{tips}',[TipsController::class,'update']);
   Route::delete('/tips/{tips}',[TipsController::class,'destroy']);
});

Route::get('/tips',[TipsController::class,'index']);
Route::get('/tips/{tips}',[TipsController::class,'show']);
