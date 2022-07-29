<?php

use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'view'])->name('profile');

Route::get('/book/{product}', [ProductController::class, 'view'])->name('product.view');
Route::get('/author/{author}', [MainController::class, 'index'])->name('author.index');
Route::get('/publisher/{publisher}', [MainController::class, 'index'])->name('publisher.index');
Route::get('/category/{category}', [MainController::class, 'index'])->name('category.index');
Route::get('/tag/{tag}', [MainController::class, 'index'])->name('tag.index');
