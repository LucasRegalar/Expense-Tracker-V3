<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\StandingorderController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/register', function () {
    return view('registration.create');
})->middleware('guest');

Route::get('/profile', function () {
    return view('registration.edit');
})->middleware('auth');

Route::get('/standingorders', [StandingorderController::class, 'index'])->middleware('auth');

Route::get('/transactions', [TransactionController::class, 'index'])->middleware('auth');
Route::get('/transaction/create', [TransactionController::class, 'create'])->middleware('auth');
Route::post('/transaction', [TransactionController::class, 'store'])->middleware('auth');
Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->middleware('auth');
Route::patch('/transaction/{id}', [TransactionController::class, 'update'])->middleware('auth');
Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');