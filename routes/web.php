<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductsController;
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

Route::get('/', [IndexController::class, 'get'])->name('main.index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('/{category}', [CategoriesController::class, 'show'])->name('category.show');
    Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::patch('/{category}', [CategoriesController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoriesController::class, 'delete'])->name('category.delete');
});

Route::group(['prefix' => 'colors'], function () {
    Route::get('/', [ColorsController::class, 'index'])->name('color.index');
    Route::get('/create', [ColorsController::class, 'create'])->name('color.create');
    Route::post('/', [ColorsController::class, 'store'])->name('color.store');
    Route::get('/{color}', [ColorsController::class, 'show'])->name('color.show');
    Route::get('/{color}/edit', [ColorsController::class, 'edit'])->name('color.edit');
    Route::patch('/{color}', [ColorsController::class, 'update'])->name('color.update');
    Route::delete('/{color}', [ColorsController::class, 'delete'])->name('color.delete');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [TagsController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagsController::class, 'create'])->name('tag.create');
    Route::post('/', [TagsController::class, 'store'])->name('tag.store');
    Route::get('/{tag}', [TagsController::class, 'show'])->name('tag.show');
    Route::get('/{tag}/edit', [TagsController::class, 'edit'])->name('tag.edit');
    Route::patch('/{tag}', [TagsController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [TagsController::class, 'delete'])->name('tag.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductsController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('/', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/{product}', [ProductsController::class, 'show'])->name('product.show');
    Route::get('/{product}/edit', [ProductsController::class, 'edit'])->name('product.edit');
    Route::patch('/{product}', [ProductsController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [ProductsController::class, 'delete'])->name('product.delete');
});
