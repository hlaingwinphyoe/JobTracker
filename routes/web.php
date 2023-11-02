<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmployerController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\PageController;
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

// employee auth
Route::name('employee.')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/register', [AuthController::class, 'customRegister'])->name('registerStore');
    Route::post('/login', [AuthController::class, 'customLogin'])->name('loginStore');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// employer auth
Route::prefix('/employer')->name('employer.')->group(function () {
    Route::get('/', [EmployerController::class, 'login'])->name('login');
    Route::post('/logout', [EmployerController::class, 'logout'])->name('logout');
});

// Employers
Route::get('/employer-lists', [HomeController::class, 'employerLists'])->name('employers.index');
Route::get('/employer-lists/{employer}', [HomeController::class, 'employerDetail'])->name('employers.show');

// Jobs
Route::get('/job-lists', [HomeController::class, 'jobLists'])->name('jobs.index');
Route::get('/job-lists/{job}', [HomeController::class, 'jobDetail'])->name('jobs.show');


// employee profile
Route::prefix('/profile')->name('profile.')->middleware('auth:employee')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/saved-jobs', 'savedJobs')->name('saved');
    Route::get('/edit-profile', 'editProfile')->name('edit');
    Route::get('/change-password', 'changePassword')->name('changePassword');
    Route::post('/update-password', 'updatePassword')->name('updatePassword');
    Route::patch('/change-info', 'changeInfo')->name('changeInfo');
    Route::post('/change-photo', 'changePhoto')->name('changePhoto');
});

Route::get('faq', [PageController::class, 'faq'])->name('faq');
Route::get('terms', [PageController::class, 'terms'])->name('terms');
Route::get('policy', [PageController::class, 'policy'])->name('policy');
Route::get('about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [PageController::class, 'contactUs'])->name('contact-us');

Route::middleware('auth:employee')->group(function () {
    Route::get('/save-jobs/{employee}/{jobPost}', [PageController::class, 'savedJob'])->name('employee-jobs.store');
    Route::get('/unsave-jobs/{employee}/{jobPost}', [PageController::class, 'detach'])->name('jobPost.detach');

    Route::get('/apply-job/{jobPost}', [PageController::class, 'applyJob'])->name('jobPost.apply');
    Route::post('/apply-job/{employee}/{jobPost}', [PageController::class, 'submitJob'])->name('jobPost.apply-submit');
});

Route::get('added-permissions/{id}', function ($id) {
    $user = User::find($id);

    $role = Role::find($user->role_id);

    if ($role) {
        $role->syncPermissions(Permission::all());
    }
    $user->givePermissionTo(Permission::all());

    return "success";
});

// for missing route
Route::fallback(function () {
    return view('composables.404');
});
