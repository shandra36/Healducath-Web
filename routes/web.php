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

use App\Http\Controllers\ProgressController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\BreakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('welcome');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
        ->name('password.email');
});


/*
|--------------------------------------------------------------------------
| AUTH (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | MOOD (SMART STUDY)
    |--------------------------------------------------------------------------
    */

    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    Route::post('/moods', [MoodController::class, 'store'])->name('moods.store');


/*
|--------------------------------------------------------------------------
| START STUDY SESSION (SMART SYSTEM)
|--------------------------------------------------------------------------
*/

Route::post('/start-session', [StudySessionController::class, 'startSession'])
    ->name('study.startSession');

/*
|--------------------------------------------------------------------------
| STUDY TIMER
|--------------------------------------------------------------------------
*/

// Timer dari navbar
Route::get('/study', [StudySessionController::class, 'start'])
    ->name('study.start');

// Simpan study session setelah timer selesai
Route::post('/study', [StudySessionController::class, 'store'])
    ->name('study.store');

// Timer dari task
Route::get('/focus/{task}', [StudySessionController::class, 'focus'])
    ->name('focus.task');
    
    /*
    |--------------------------------------------------------------------------
    | BREAK TIME
    |--------------------------------------------------------------------------
    */

    Route::get('/break', [BreakController::class, 'random'])
        ->name('break.random');


    /*
    |--------------------------------------------------------------------------
    | TASK MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::post('/tasks/{id}/complete', [TaskController::class, 'complete'])
        ->name('tasks.complete');

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])
        ->name('tasks.delete');


    /*
    |--------------------------------------------------------------------------
    | PROGRESS PAGE
    |--------------------------------------------------------------------------
    */

Route::get('/progress', [ProgressController::class, 'index'])
    ->name('progress');
    
    });