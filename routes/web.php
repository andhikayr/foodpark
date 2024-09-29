<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::post('/update-profile', 'updateProfile')->name('frontend.profile.update');
    Route::post('/update-password', 'updatePassword')->name('frontend.password.update');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/admin/login', 'login')->name('admin.login');
    Route::get('/admin/forget-password', 'forgetPassword')->name('admin.forget_password');
    Route::get('admin/reset-password/{token}', 'resetPassword');
    Route::post('admin/forget-password', 'storeResetPassword')->name('auth.store_reset_password');
});

require __DIR__.'/auth.php';
