<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
    ], function () {
       // Route for Dashboard page
       Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
       Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});