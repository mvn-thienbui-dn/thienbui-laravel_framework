<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/create', [\App\Http\Controllers\Api\UserController::class,'store']);
Route::get('/edit/{id}', [\App\Http\Controllers\Api\UserController::class,'edit']);
Route::put('/update/{id}', [\App\Http\Controllers\Api\UserController::class,'update']);
Route::delete('/delete/{id}', [\App\Http\Controllers\Api\UserController::class,'destroy']);
    