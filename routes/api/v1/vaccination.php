<?php


use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\ExerciseplansController;
use App\Http\Controllers\Admin\VaccinationsController;
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
   Route::post('/vaccination',[VaccinationsController::class,'store']);
   Route::patch('/vaccination/{vaccinations}',[VaccinationsController::class,'update']);
   Route::delete('/vaccination/{vaccinations}',[VaccinationsController::class,'destroy']);
});

Route::get('/vaccination',[VaccinationsController::class,'index']);
Route::get('/vaccination/{vaccinations}',[VaccinationsController::class,'show']);
