<?php

use App\Http\Controllers\Api\BusinessController;
use Illuminate\Http\Request;
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

Route::prefix('business')->group(function() {
    Route::get('/', [BusinessController::class, 'index']);
    Route::post('/', [BusinessController::class, 'store']);
    Route::put('{id}', [BusinessController::class, 'update']);
    Route::delete('{id}', [BusinessController::class, 'destroy']);
});