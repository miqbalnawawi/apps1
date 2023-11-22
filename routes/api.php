<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSOController;

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

Route::post('/register', [SSOController::class, 'register']);
Route::post('/login', [SSOController::class, 'login']);
// Route::middleware('auth:api')->post('/logout', [SSOController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::get('/get-user-data', [SSOController::class, 'getUserData']);
    Route::post('/logout', [SSOController::class, 'logout']);
});
