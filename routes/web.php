<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category_name}', [HomeController::class, 'select'])->name('category.select');
Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('front.login');
Route::get('/signup',[\App\Http\Controllers\UserController::class,'signup'])->name('front.signup');
Route::post('/signup',[\App\Http\Controllers\UserController::class,'register'])->name('front.register');
Route::post('/login',[\App\Http\Controllers\UserController::class,'authenticate'])->name('front.begin');
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('front.logout');
Route::get('/post',[\App\Http\Controllers\UserController::class,'post'])->name('admin.post');
Route::post('post/store',[\App\Http\Controllers\PostController::class,'store'])->name('admin.posts.store');
Route::get('admin/posts/create',[\App\Http\Controllers\UserController::class,'create'])->name('admin.posts.create');
Route::get('/home', function () {
    $data = "samir";
    $categories = \App\Models\Category::all();
    return view('front.pages.salam', compact('data', 'categories'));
});



