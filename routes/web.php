<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/forget_password', [AuthController::class, 'forget_password'])->name('admin.forget_password');

require __DIR__.'/auth.php';
