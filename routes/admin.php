<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logout'])->name(name: 'logout');
});
