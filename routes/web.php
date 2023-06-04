<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('login', fn() => view('auth.login'))->name('login');
Route::get('register', fn() => view('auth.register'))->name('register');

// Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('index');
});
