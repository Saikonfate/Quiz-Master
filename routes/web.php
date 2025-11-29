<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/historico', function () {
    return view('historico');
})->middleware(['auth', 'verified'])->name('historico');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/api/quiz/start', [QuizController::class, 'start']);
    Route::post('/api/quiz/submit', [QuizController::class, 'submit']);
    Route::post('/api/quiz/check-answer', [QuizController::class, 'checkAnswer']);
    Route::get('/api/quiz/ranking', [QuizController::class, 'ranking']);
    Route::get('/api/quiz/history', [QuizController::class, 'history']);
});

require __DIR__.'/auth.php';
