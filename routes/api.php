<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarToUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('users')->group(function (){
    Route::post('/add', [UserController::class, 'create']);
    Route::get('/get', [UserController::class, 'getById']);
    Route::get('/getAll', [UserController::class, 'getList']);
    Route::post('/update', [UserController::class, 'update']);
    Route::delete('/delete', [UserController::class, 'delete']);
    Route::post('/newCar', [CarToUserController::class, 'create']);
    Route::delete('/deleteCar', [CarToUserController::class, 'delete']);
    Route::get('/history', [CarToUserController::class, 'getHistory']);
});

Route::prefix('cars')->group(function (){
    Route::post('/add', [CarController::class, 'create']);
    Route::get('/get', [CarController::class, 'getById']);
    Route::get('/getAll', [CarController::class, 'getList']);
    Route::post('/update', [CarController::class, 'update']);
    Route::delete('/delete', [CarController::class, 'delete']);
});
