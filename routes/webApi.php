<?php

use App\Http\Controllers\WebApi\AuthController;
use App\Http\Controllers\WebApi\PageController;
use Illuminate\Support\Facades\Route;

Route::post('/employer-register', [AuthController::class, 'employerRegister']);
Route::post('/employer-login', [AuthController::class, 'employerLogin']);

Route::get('/get-regions', [PageController::class, 'regionList']);
Route::get('/get-jobs', [PageController::class, 'jobPostList']);
Route::get('/get-employers', [PageController::class, 'employerList']);
Route::get('/get-employer-jobs/{employerId}', [PageController::class, 'employerJobs']);