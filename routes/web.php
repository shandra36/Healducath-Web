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
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('welcome');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST ONLY)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // LOGIN
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // REGISTER
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // FORGOT PASSWORD
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
        ->name('password.email');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // DASHBOARD (MAIN PAGE)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MOOD
    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    Route::post('/moods', [MoodController::class, 'store'])->name('moods.store');

    // STUDY
    Route::get('/study', [StudySessionController::class, 'start'])->name('study.start');
    Route::post('/study', [StudySessionController::class, 'store'])->name('study.store');

    // BREAK
    Route::get('/break', [BreakActivityController::class, 'random'])->name('break.random');
});