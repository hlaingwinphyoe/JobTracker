<?php

use App\Http\Controllers\WebApi\AuthController;
use App\Http\Controllers\WebApi\PageController;
use Illuminate\Support\Facades\Route;

Route::post('/employer-register', [AuthController::class, 'employerRegister']);

Route::get('/get-regions', [PageController::class, 'regionList']);