<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\EquipmentController;
use \App\Http\Controllers\Api\TypeEquipmentController;
use \App\Http\Controllers\FirstController;
use \App\Http\Controllers\Api\ApiAuthController;

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


Route::post('/login', [ApiAuthController::class, 'login']); 
Route::post('/register', [ApiAuthController::class, 'register']);
Route::get('/search/{search}', [EquipmentController::class, 'search']);
Route::get('/equipment', [EquipmentController::class, 'index']);
Route::get('/equipment/{id}', [EquipmentController::class, 'show']);
Route::post('/logout', [ApiAuthController::class, 'logout']);

Route::get('/equipment-type', [TypeEquipmentController::class, 'index']);
Route::get('/equipment-type/{search}', [TypeEquipmentController::class, 'search']);
Route::get('/manager', [TypeEquipmentController::class, 'manager']);

//! Route::apiResources(['equipment'=>EquipmentController::class]);
Route::group(['middleware'=>'auth:sanctum'], function() {
    Route::delete('/equipment/{id}', [EquipmentController::class, 'delete']);
    Route::put('/equipment/{id}', [EquipmentController::class, 'update']);
    Route::post('/equipment', [EquipmentController::class, 'store']);
});