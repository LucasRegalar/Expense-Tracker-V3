<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/transactions', function () {
    return view('transactions');
});

Route::get('/incomes', function () {
    return view('incomes');
});

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);


Route::get('/register', function () {
    return view('registration.create');
});

Route::get('/profile', function () {
    return view('registration.edit');
});


/* Middleware:
->middleware('auth');
->middleware('guest'); ?
*/
