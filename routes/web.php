<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::get('/verifyaccount', [MovieController::class, 'verifyaccount'])->name('verifyaccount');
Route::post('/verifyotp', [MovieController::class, 'useractivation'])->name('verifyotp');
Route::post('/movie/signup',[SignupController::class,'signup'])->name('movie.signup');
Route::post('/movie/login',[LoginController::class,'login'])->name('movie.login');
Route::get('/movie/loginpage',[LoginController::class,'loginpage'])->name('movie.loginpage');
Route::get('/movie/register',[SignupController::class,'register'])->name('movie.register');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
