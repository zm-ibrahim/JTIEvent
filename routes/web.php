<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('guest')->group(function () {
    // Auth
    Route::get('login', [AuthController::class, 'displayLoginPage'])->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'displayRegisterPage'])->name('registerPage');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


// Dashboard
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard.index'))->name('index');
});
