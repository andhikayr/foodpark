<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('about', function () {
        return view('admin.about');
    })->name(name: 'about');
    Route::get('logout', [AuthController::class, 'logout'])->name(name: 'logout');

    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::put('profile/update', 'updateProfile')->name('profile.update');
        Route::put('profile/update_password', 'updatePassword')->name('profile.update.password');
    });

    // Slider
    Route::put('slider/status/{id}', [SliderController::class, 'updateStatus'])->name('slider.status');
    Route::resource('slider', SliderController::class);

    // Produk "Mengapa Memilih Kita"
    Route::put('why-choose-us/title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-us.title-update');
    Route::put('why-choose-us/status/{id}', [WhyChooseUsController::class, 'updateStatus'])->name('why-choose-us.status');
    Route::resource('why-choose-us', WhyChooseUsController::class);

    // Kategori Produk
    Route::put('product-category/status/{id}', [ProductCategoryController::class, 'updateStatus'])->name('product-category.status');
    Route::put('product-category/show-at-home/{id}', [ProductCategoryController::class, 'updateShowAtHome'])->name('product-category.show-at-home');
    Route::resource('product-category', ProductCategoryController::class);

    // Produk
    Route::resource('product', ProductController::class);

});
