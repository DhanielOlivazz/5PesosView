<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GetPostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Landing
Route::get('/', fn() => view('landing'));

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Home
Route::get('/home', fn() => view('home', ['posts' => Post::latest()->get()]))
    ->middleware('auth')
    ->name('home');

// Perfil protegido
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/me', [ProfileController::class, 'myProfile'])->name('me');
    Route::get('/{profile}', [ProfileController::class, 'show'])->name('show');
    Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/{profile}', [ProfileController::class, 'update'])->name('update');
});

// Posts
Route::get('/posts/{post}', [GetPostController::class, 'show'])->name('posts.show');
