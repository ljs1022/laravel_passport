<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\Tests;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Authentication
 */

Route::prefix('v1')->group(function () {
    Route::post('/auth/register', [Auth\AuthController::class, 'register']);
    Route::post('/auth/login', [Auth\AuthController::class, 'login']);

    //需要身分驗證才能訪問
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/auth/refresh-token', [Auth\AuthController::class, 'refreshToken']);
        Route::post('/tests', [Tests\TestController::class, 'index']);
        Route::post('/auth/logout', [Auth\AuthController::class, 'logout']);
    });
});
