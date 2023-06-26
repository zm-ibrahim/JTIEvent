<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
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
    Route::get('register', [AuthController::class, 'displayRegisterPage'])->name('registerPage');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::prefix('dashboard')->name('dashboard.')
    ->middleware('auth')->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'dashboard')->name('index');
            Route::get('profile', 'profile')->name('profile');
            Route::post('profile', 'updateProfile')->name('profile.update');

            Route::get('personal-data/participant', 'participantPersonalData')->name('personal-data.participant');
            Route::post('personal-data/participant/update', 'updateParticipantPersonalData')->name('personal-data.participant.update');

            Route::get('personal-data/judge', 'judgePersonalData')->name('personal-data.judge');
            Route::post('personal-data/judge/update', 'updateJudgePersonalData')->name('personal-data.judge.update');

            Route::get('add-judge', 'addJudge')->name('add-judge');
            Route::post('add-judge', 'saveJudge')->name('add-judge');
        });

        Route::get('event/{event}/judges', [EventController::class, 'listJudges'])->name('event.judges');
        Route::post('event/{event}/judges/store', [EventController::class, 'saveJudges'])->name('event.judges.store');
        Route::delete('event/{event}/judges/delete', [EventController::class, 'deleteJudge'])->name('event.judges.delete');
        Route::resource('event', EventController::class);
    });

