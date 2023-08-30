<?php


use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\ExerciseplansController;
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
   Route::post('/exercise',[ExerciseplansController::class,'store']);
   Route::patch('/exercise/{exercise}',[ExerciseplansController::class,'update']);
   Route::delete('/exercise/{exercise}',[ExerciseplansController::class,'destroy']);
});

Route::get('/exercise',[ExerciseplansController::class,'index']);
Route::get('/exercise/{exercise}',[ExerciseplansController::class,'show']);
