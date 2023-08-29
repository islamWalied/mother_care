<?php


use App\Http\Controllers\Admin\ArticlesController;
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
   Route::post('/articles',[ArticlesController::class,'store']);
   Route::patch('/articles/{articles}',[ArticlesController::class,'update']);
   Route::delete('/articles/{articles}',[ArticlesController::class,'destroy']);
});

Route::get('/articles',[ArticlesController::class,'index']);
Route::get('/articles/{articles}',[ArticlesController::class,'show']);
