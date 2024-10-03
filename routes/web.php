<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::get('/dashboard', function () {
    return view('frontend.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [ProfileController::class, 'UserLogout'])->name('user.logout');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/password/change', [ProfileController::class, 'PasswordChange'])->name('change.password');

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


//ALL ROUTER FOR CLIENT

Route::middleware('client')->group(function () {
    Route::get('client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
    Route::get('client/profile', [ClientController::class, 'ClientProfile'])->name('client.profile');
    Route::post('client/profile_update', [ClientController::class, 'ClientProfileUpdate'])->name('client.profile.update');
    Route::get('client/password_change', [ClientController::class, 'ClientPasswordChange'])->name('client.change.password');
    Route::post('client/password_change_submit', [ClientController::class, 'ClientPasswordChangeSubmit'])->name('client.change_password_submit');
});
Route::get('client/register', [ClientController::class, 'ClientRegister'])->name('client.register');
// Route::post('client/register_submit', [ClientController::class, 'ClientRegisterSubmit'])->name('client.register_submit');
Route::get('client/login', [ClientController::class, 'ClientLogin'])->name('client.login');
Route::post('client/login_submit', [ClientController::class, 'ClientLoginSubmit'])->name('client.login_submit');
Route::get('client/logout', [ClientController::class, 'ClientLogout'])->name('client.logout');
Route::get('client/forgot_password', [ClientController::class, 'ClientForgotPassword'])->name('client.forgot_password');
Route::post('client/reset_password', [ClientController::class, 'ClientResetPassword'])->name('client.reset_password');
Route::get('client/reset-password/{token}/{email}', [ClientController::class, 'ClientResetPasswordForm'])->name('client.reset-password');
Route::post('client/reset_password_submit', [ClientController::class, 'ClientResetPasswordSubmit'])->name('client.reset_password_submit');

