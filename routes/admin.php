<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\HomeSlideController;
use App\Http\Controllers\backend\AboutController;



Route::get('/dashboard', function () {
    return view('backend.layouts.main');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'Admin_dashboard')->name('dashboard');
            Route::get('/logout', 'Admin_logout')->name('admin.logout');
        }); //End Route

        // Profile Route Section
        Route::group(['prefix' => 'profile'], function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/', 'Profile')->name('admin.profile');
                Route::get('/edit', 'edit')->name('profile.edit');
                Route::post('/update', 'update')->name('profile.update');
            });
        }); //End Route

        // Home Slider Route Section
        Route::group(['prefix' => 'home-slider'], function () {
            Route::controller(HomeSlideController::class)->group(function () {
                Route::get('/', 'Home_Slider')->name('home.slider');
                Route::post('/insert', 'Home_Slider_Insert')->name('home_slider.insert');
                Route::post('/update', 'Home_Slider_Update')->name('home_slider.update');
            });
        }); //End Route

        // About Route Section
        Route::group(['prefix' => 'about'], function () {
            Route::controller(AboutController::class)->group(function () {
                Route::get('/', 'About')->name('about.info');
                Route::post('/store', 'About_Store')->name('about.store');
                Route::post('/update/{id}', 'About_Info_Update')->name('update.about');
            });
        }); //End Route
    });
});




require __DIR__ . '/auth.php';
