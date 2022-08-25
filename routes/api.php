<?php

use App\Http\Controllers\Api\v1\AuthLoginController;
use App\Http\Controllers\Api\v1\AuthLogoutController;
use App\Http\Controllers\Api\v1\AuthRegisterController;
use App\Http\Controllers\Api\v1\AuthViewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::post('login', AuthLoginController::class)->name('auth.login');
        Route::post('register', AuthRegisterController::class)->name('auth.register');
        Route::post('logout', AuthLogoutController::class)->middleware('auth:sanctum')->name('auth.logout');
        Route::get('view', AuthViewController::class)->middleware('auth:sanctum')->name('auth.view');
    });
});
