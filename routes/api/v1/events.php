<?php


use App\Http\Controllers\Admin\EventsController;
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
   Route::post('/events',[EventsController::class,'store']);
   Route::patch('/events/{events}',[EventsController::class,'update']);
   Route::delete('/events/{events}',[EventsController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/event_register',[EventsController::class,'event_register']);
});

Route::get('/events',[EventsController::class,'index']);
Route::get('/events/{events}',[EventsController::class,'show']);


