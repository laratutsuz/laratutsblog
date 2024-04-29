<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PageController::class, "index"])->name("index");

// POSTS
Route::group(['prefix' => 'post'], function () {
    Route::get('all', [PostController::class, 'index'])->name('post.index');
    Route::get('create', [PostController::class, 'create'])->name('post.create');
    Route::post('store', [PostController::class, 'store'])->name('post.store');
    Route::get('edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('update', [PostController::class, 'update'])->name('post.update');
    Route::get('show/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});

// CATEGORIES
Route::get("/category/{id}", [CategoryController::class, "show"])->name("category.show");

// API
Route::get("/integrated", [PageController::class, "integrated"])->name("pages.integrated");

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

