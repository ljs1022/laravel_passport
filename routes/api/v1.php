<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth;
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
});
