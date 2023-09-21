<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home.index');

// auth
Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
Route::get('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::post('/register',[AuthController::class,'customRegister'])->name('register.store');
Route::post('/login',[AuthController::class,'customLogin'])->name('login.store');


// Jobs
Route::get('/job-lists', [HomeController::class, 'jobLists'])->name('home.jobs');


// employee profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');