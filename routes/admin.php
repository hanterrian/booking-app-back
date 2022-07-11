<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'login'])->withoutMiddleware('auth.admin')->name('auth.login');
    Route::post('sign-in', [AuthController::class, 'signIn'])->withoutMiddleware('auth.admin')->name('auth.sign-in');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
