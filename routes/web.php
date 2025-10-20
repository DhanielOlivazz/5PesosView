<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home'); // Vista protegida después de login
})->middleware('auth');

ROUTE::get('/', function () {
    return view('landing');
});

route::get('/register', function () {
    return view('register');
});