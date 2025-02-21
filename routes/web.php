<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\VerifyController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::get('/admin/movie',[AdminController::class,'index'])->name('admin.index')->middleware(EnsureUserIsAdmin::class);
Route::get('/verifyaccount', [VerifyController::class, 'verifyaccount'])->name('verifyaccount');
Route::post('/verifyotp', [VerifyController::class, 'useractivation'])->name('verifyotp');
Route::post('/movie/signup',[SignupController::class,'signup'])->name('movie.signup');
Route::post('/movie/login',[LoginController::class,'login'])->name('movie.login');
Route::get('/movie/loginpage',[LoginController::class,'loginpage'])->name('movie.loginpage');
Route::get('/movie/register',[SignupController::class,'register'])->name('movie.register');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
