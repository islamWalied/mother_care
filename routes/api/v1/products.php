<?php


use App\Http\Controllers\Admin\ProductsController;
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
   Route::post('/products',[ProductsController::class,'store']);
   Route::patch('/products/{products}',[ProductsController::class,'update']);
   Route::delete('/products/{products}',[ProductsController::class,'destroy']);
});

Route::get('/products',[ProductsController::class,'index']);
Route::get('/products/{products}',[ProductsController::class,'show']);
