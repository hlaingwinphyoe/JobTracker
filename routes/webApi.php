<?php

use App\Http\Controllers\WebApi\AuthController;
use App\Http\Controllers\WebApi\PageController;
use App\Http\Controllers\WebApi\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/employer-register', [AuthController::class, 'employerRegister']);
Route::post('/employer-login', [AuthController::class, 'employerLogin']);

Route::get('/get-regions', [PageController::class, 'regionList']);
Route::get('/get-jobs', [PageController::class, 'jobPostList']);
Route::get('/get-employers', [PageController::class, 'employerList']);
Route::get('/get-employer-jobs/{employerId}', [PageController::class, 'employerJobs']);

// get avatars
Route::get('/get-avatars', [ProfileController::class, 'getAvatars']);
Route::post('/avatar-upload/{id}', [ProfileController::class, 'avatarUpload']);
Route::post('/image-upload/{id}', [ProfileController::class, 'imageUpload']);


// save jobs
Route::get('/save-jobs/{employee}/{jobPost}', [PageController::class, 'savedJobs']);

Route::get('/get-auth-employee', function () {
    $auth_employee = Auth::guard('employee')->user();

    return response()->json([
        'auth_employee' => $auth_employee
    ]);
});

Route::get('/get-auth-user', function () {
    $auth_user = Auth::user();

    return response()->json([
        'auth_user' => $auth_user
    ]);
});
