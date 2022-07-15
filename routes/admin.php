<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'login'])->withoutMiddleware('auth.admin')->name('auth.login');
    Route::post('sign-in', [AuthController::class, 'signIn'])->withoutMiddleware('auth.admin')->name('auth.sign-in');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
