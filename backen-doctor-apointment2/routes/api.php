<?php

use App\Http\Controllers\AppointmentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [UserController::class,'index']);
    Route::post('/fav', [UserController::class,'favDocs']);
    Route::post('/logout', [UserController::class,'logout']);
    Route::post('/apointments', [AppointmentsController::class,'store']);
    Route::get('/apointments', [AppointmentsController::class,'index']);
});
