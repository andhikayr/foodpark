<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/admin/login', 'login')->name('admin.login');
    Route::get('/admin/forget-password', 'forgetPassword')->name('admin.forget_password');
    Route::get('admin/reset-password/{token}', 'resetPassword');
    Route::post('admin/forget_password', 'storeResetPassword')->name('auth.store_reset_password');
});

require __DIR__.'/auth.php';
