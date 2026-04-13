<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\MoodController;
use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\BreakActivityController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |----------------------------------------------------------------------
    | MOOD CHECK-IN
    |----------------------------------------------------------------------
    */

    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    Route::post('/mood', [MoodController::class, 'store'])->name('moods.store');


    /*
    |----------------------------------------------------------------------
    | STUDY SESSION
    |----------------------------------------------------------------------
    */

    Route::get('/study', [StudySessionController::class, 'start'])->name('study.start');
    Route::post('/study', [StudySessionController::class, 'store'])->name('study.store');


    /*
    |----------------------------------------------------------------------
    | BREAK ACTIVITY
    |----------------------------------------------------------------------
    */

    Route::get('/break', [BreakActivityController::class, 'random'])->name('break.random');


    /*
    |----------------------------------------------------------------------
    | WELLBEING DASHBOARD
    |----------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});