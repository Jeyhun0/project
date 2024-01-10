<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('/login', [\App\Http\Controllers\AdminController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index']);


    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/products', [\App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
    Route::get('/posts', [\App\Http\Controllers\AdminController::class, 'posts'])->name('admin.posts');

    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


    Route::get('/profile', [\App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [\App\Http\Controllers\AdminController::class, 'updateProfile']);
    Route::get('/category-add', [\App\Http\Controllers\CategoryAdd::class, 'add'])->name('admin.products.categoryadd');
    Route::post('/create', [\App\Http\Controllers\CategoryAdd::class, 'create'])->name('admin.category.create');
    Route::get('/add', [\App\Http\Controllers\PostController::class, 'add'])->name('admin.post.add');
    Route::post('/creat', [\App\Http\Controllers\PostController::class, 'creat'])->name('admin.post.create');
    Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryAdd::class, 'destroy'])->name('admin.category.delete');
    Route::get('/post-destroy/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('admin.post.delete');
});



