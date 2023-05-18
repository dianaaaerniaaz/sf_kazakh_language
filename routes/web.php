<?php

use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\GameController;


Route::get('/posts/category/{category}',[PostController::class,'postByCategory'])->name('posts.category');

Route::get('/',function (){
    return redirect()->route('posts.index');
});
Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/tests/category/{category}',[TestController::class,'questionByCategory'])->name('questions.category');

Route::get('/tests/create/', [TestController::class, 'create'])->name('tests.create');
Route::post('/tests', [TestController::class, 'store'])->name('tests.store');
Route::get('/tests/result/{score}/{total}', [TestController::class, 'result'])->name('tests.result');
Route::delete('/dictionary/{word}', [DictionaryController::class, 'destroy'])->name('dictionary.destroy');
Route::get('/dictionary/create', [DictionaryController::class, 'create'])->name('dictionary.create');
Route::post('/dictionary', [DictionaryController::class, 'store'])->name('dictionary.store');
Route::get('/dictionary', [DictionaryController::class, 'index'])->name('dictionary.index');
Route::get('games', [GameController::class, 'index'])->name('games.index');
Route::post('games/{game}', [GameController::class, 'check'])->name('games.check');
//Route::get('/game', [GameController::class, 'index'])->name('game.index');
Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//Route::post('/game/guess', [GameController::class, 'guess'])->name('game.guess');
//Route::post('/game/guess-word', [GameController::class, 'guessWord'])->name('game.guess-word');
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

