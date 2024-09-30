<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin login
Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::post('admin/profile_update', [AdminController::class, 'ProfileUpdate'])->name('admin.profile.update');
    Route::get('admin/password_change', [AdminController::class, 'PasswordChange'])->name('admin.change.password');
    Route::post('admin/password_change_submit', [AdminController::class, 'PasswordChangeSubmit'])->name('admin.change_password_submit');
});
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login_submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login_submit');
Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('admin/forgot_password', [AdminController::class, 'ForgotPassword'])->name('admin.forgot_password');
Route::post('admin/reset_password', [AdminController::class, 'ResetPassword'])->name('admin.reset_password');
Route::get('admin/reset-password/{token}/{email}', [AdminController::class, 'ResetPasswordForm'])->name('admin.reset-password');
Route::post('admin/reset_password_submit', [AdminController::class, 'ResetPasswordSubmit'])->name('admin.reset_password_submit');
