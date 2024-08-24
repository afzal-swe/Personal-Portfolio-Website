<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\HomeSlideController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\BlogCategoriesController;
use App\Http\Controllers\backend\BlogsController;



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
                // Multi Images
                Route::get('/images', 'About_Multi_Images')->name('about_multi.image');
                Route::get('/images/store', 'About_Multi_Images_Store')->name('about_multi.store');
                Route::post('/images/create', 'About_Multi_Images_Insert')->name('about_multi.create');
                Route::get('/images/edit/{id}', 'About_Multi_Images_Edit')->name('about_multi.edit');
                Route::post('/images/update', 'About_Multi_Images_Update')->name('about_multi.update');
                Route::get('/delete/{id}', 'Image_Delete')->name('about_multi.delete');
            });
        }); //End Route

        // Project Portfolio Route Section
        Route::group(['prefix' => 'project-portfolio'], function () {
            Route::controller(PortfolioController::class)->group(function () {
                Route::get('/', 'All_Project_Portfolio')->name('all_project_portfolio');
                Route::get('/create', 'Project_Portfolio_Create')->name('project_portfolio.create');
                Route::post('/store', 'Project_Portfolio_Store')->name('project_portfolio.store');
                Route::get('/edit/{id}', 'Project_Portfolio_Edit')->name('project_portfolio.edit');
                Route::post('/update', 'Project_Portfolio_Update')->name('project_portfolio.update');
                Route::get('/delete/{id}', 'Project_Portfolio_Delete')->name('project_portfolio.delete');
            });
        }); //End Route

        // Blog Category Route Section
        Route::group(['prefix' => 'blog-category'], function () {
            Route::controller(BlogCategoriesController::class)->group(function () {
                Route::get('/', 'All_Blog_Category_View')->name('all_blog_category.view');
                Route::get('/create', 'Blog_Category_Create')->name('blog_category.create');
                Route::get('/edit/{id}', 'Blog_Category_Edit')->name('blog_category.edit');
                Route::post('/update', 'Blog_Category_Update')->name('blog_category.update');
                Route::post('/store', 'Blog_Category_Store')->name('blog_category.store');
                Route::get('/delete/{id}', 'Blog_Category_Delete')->name('blog_category.delete');
            });
        }); //End Route

        // Blog Route Section
        Route::group(['prefix' => 'blog'], function () {
            Route::controller(BlogsController::class)->group(function () {
                Route::get('/', 'View_All_Blog')->name('view_all_blog');
                Route::get('/create', 'Blog_Create')->name('blog.create');
                Route::post('/store', 'Blog_Store')->name('blog.store');
                Route::get('/edit/{id}', 'Blog_Edit')->name('blog.edit');
                Route::post('/update', 'Blog_Update')->name('blog.update');
                Route::get('/delete/{id}', 'Blog_Delete')->name('blog.delete');
            });
        }); //End Route

        // Settings Route Section
        Route::group(['prefix' => 'setting'], function () {
            Route::controller(SettingsController::class)->group(function () {
                Route::group(['prefix' => 'socials'], function () {
                    Route::get('/', 'Socials')->name('socials');
                    Route::post('/insert', 'Socials_Insert')->name('socials.insert');
                    Route::post('/update', 'Socials_Update')->name('socials.update');
                }); // End 
                Route::group(['prefix' => 'seos'], function () {
                    Route::get('/', 'Seos')->name('seos');
                    Route::post('/insert', 'Seos_Insert')->name('seos.insert');
                    Route::post('/update', 'Seos_Update')->name('seos.update');
                }); // End 
                Route::group(['prefix' => 'website-settings'], function () {
                    Route::get('/', 'Website_Settings')->name('website_settings');
                    Route::post('/insert', 'Website_Settings_Data_Insert')->name('website_settings_data.insert');
                    Route::post('/update', 'Website_Settings_Data_Update')->name('website_settings_data.update');
                }); // End 
            });
        }); //End Route
    });
});




require __DIR__ . '/auth.php';
