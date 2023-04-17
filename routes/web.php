<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Adm\UserController;


Route::get('/posts/category/{category}',[PostController::class,'postByCategory'])->name('posts.category');

Route::get('/',function (){
    return redirect()->route('posts.index');
});
Route::prefix('adm')->as('adm.')->middleware('hasRole:admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
});
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except('index','show');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
});
Route::resource('posts', PostController::class)->only('index','show');


#Route::get('/', [PostController::class, 'index'])->name('posts.index');
#Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
#Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
#Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

#Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

