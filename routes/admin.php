<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logout'])->name(name: 'logout');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::put('profile/update', 'updateProfile')->name('profile.update');
        Route::put('profile/update_password', 'updatePassword')->name('profile.update.password');
    });
});
