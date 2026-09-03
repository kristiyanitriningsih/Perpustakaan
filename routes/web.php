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

       // Route for Profile page
       Route::get('/profile', [App\Http\Controllers\ProfileController::class,'index'])->name('profile.index');
       Route::post('/profile', [App\Http\Controllers\ProfileController::class,'save'])->name('profile.save');

       //Route for Admin page
       Route::resource('/admin', App\Http\Controllers\AdminController::class);

       //Route for Data Buku page
       Route::resource('/book', App\Http\Controllers\BookController::class);

       //Route for Loan page
       Route::resource('/loan', App\Http\Controllers\LoanController::class);
});