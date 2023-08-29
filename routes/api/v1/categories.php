<?php

use App\Http\Controllers\Admin\CategoriesController;
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

   Route::post('/categories',[CategoriesController::class,'store']);
   Route::patch('/categories/{categories}',[CategoriesController::class,'update']);
   Route::delete('/categories/{categories}',[CategoriesController::class,'destroy']);
});
Route::get('/categories',[CategoriesController::class,'index']);
Route::get('/categories/{categories}',[CategoriesController::class,'show']);
