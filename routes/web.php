<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\ParticipantEventController;
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

Route::get('/', [LandingController::class, 'landing'])->name('landingPage');
Route::get('list', [LandingController::class, 'index'])->name('list');
Route::get('list/{event}', [LandingController::class, 'show'])->name('ShowEvent');

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
        Route::get('event/participant', [EventController::class, 'listParticipantEvent'])->name('event.participant');
        Route::get('event/participant/{event}/certificate', [EventController::class, 'printCertificate'])->name('event.participant.certificate');
        Route::get('event/judge', [JudgeController::class, 'events'])->name('event.judge');
        Route::get('event/{event}/participant', [JudgeController::class, 'eventParticipants'])->name('event.judge.participant');
        Route::post('event/{participant_event}/give-score', [JudgeController::class, 'giveScore'])->name('event.judge.participant.give-score');
        Route::resource('event', EventController::class);
    });


// Route::get('list');