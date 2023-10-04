<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// auth
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/register', [AuthController::class, 'customRegister'])->name('register.store');
Route::post('/login', [AuthController::class, 'customLogin'])->name('login.store');


// Jobs
Route::get('/job-lists', [HomeController::class, 'jobLists'])->name('home.jobs');


// Employers
Route::get('/employer-lists', [HomeController::class, 'employerLists'])->name('home.employers');

// employee profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
Route::patch('/change-info', [ProfileController::class, 'changeInfo'])->name('profile.changeInfo');
Route::post('/change-photo', [ProfileController::class, 'changePhoto'])->name('profile.changePhoto');

Route::get('added-permissions/{id}', function ($id) {
    $user = User::find($id);

    $role = Role::find($user->role_id);

    if ($role) {
        $role->syncPermissions(Permission::all());
    }
    $user->givePermissionTo(Permission::all());

    return "success";
});


Route::get('test', function() {
    // $user = User::employer()->get();
    $user = User::whereHas('roles', function ($q) {
        $q->where('name', 'Employer');
    })->get();
    dd($user);
});