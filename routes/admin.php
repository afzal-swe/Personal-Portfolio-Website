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
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\ProgressController;
use App\Http\Controllers\backend\WorkingProcessController;
use App\Http\Controllers\backend\FeedbackController;
use App\Http\Controllers\backend\PartnersController;
use App\Http\Controllers\backend\ServicesController;



Route::get('/dashboard', function () {
    return view('backend.layouts.main');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'Admin_dashboard')->name('dashboard');
            Route::get('/logout', 'Admin_logout')->name('admin.logout');
            Route::get('/change-password', 'Change_Password')->name('change.password');
            Route::post('/update-password', 'Update_Password')->name('password_update');
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

        // Blog Route Section
        Route::group(['prefix' => 'message'], function () {
            Route::controller(ContactController::class)->group(function () {
                Route::get('/', 'View_All_Message')->name('message.view');
                Route::get('/delete/{id}', 'Message_Delete')->name('message.delete');
            });
        }); //End Route

        // Progress Route Section
        Route::group(['prefix' => 'progress'], function () {
            Route::controller(ProgressController::class)->group(function () {
                Route::get('/', 'Progress_View')->name('progress.view');
                Route::post('/create', 'Progress_Create')->name('progress.insert');
                Route::get('/edit/{id}', 'Progress_Edit');
                Route::get('/delete/{slug}', 'Progress_Delete')->name('progress.delete');
                Route::get('/status/{slug}', 'Progress_Status')->name('progress.status');
            });
        }); //End Route

        // Working Process Route Section
        Route::group(['prefix' => 'working-process'], function () {
            Route::controller(WorkingProcessController::class)->group(function () {
                Route::get('/', 'Working_Porcess_View')->name('working_process.manage');
                Route::get('/create', 'Working_Porcess_Create')->name('working_process.create');
                Route::post('/store', 'Working_Porcess_Store')->name('working_process.store');
                Route::get('/edit/{id}', 'Working_Porcess_Edit')->name('working_process.edit');
                Route::post('/update', 'Working_Porcess_Update')->name('working_process.update');
                Route::get('/delete/{id}', 'Working_Porcess_Delete')->name('working_process.delete');
                Route::get('/status/{id}', 'Working_Porcess_Status')->name('working_process.status');
            });
        }); //End Route

        // Feedback Route Section
        Route::group(['prefix' => 'manage-feedback'], function () {
            Route::controller(FeedbackController::class)->group(function () {
                Route::get('/', 'Feedback_Manage')->name('feedback_manage');
                Route::post('/store', 'Feedback_Store')->name('feedback.store');
                Route::get('/edit/{id}', 'Feedback_Edit')->name('feedback.edit');
                Route::post('/update', 'Feedback_Update')->name('feedback.update');
                Route::get('/delete/{id}', 'Feedback_Delete')->name('feedback.delete');
            });
        }); //End Route

        // Partner Route Section
        Route::group(['prefix' => 'partner'], function () {
            Route::controller(PartnersController::class)->group(function () {
                Route::get('/', 'Partners_Create')->name('partners.create');
                Route::post('/store', 'Partners_Store')->name('partners.store');
                Route::post('/update', 'Partners_Update')->name('partners.update');
            });
        }); //End Route

        // Services Route Section
        Route::group(['prefix' => 'services'], function () {
            Route::controller(ServicesController::class)->group(function () {
                Route::get('/all', 'All_Services_Manage')->name('services_all_manage');
                Route::get('/create', 'Services_Create')->name('services.create');
                Route::post('/store', 'Services_Store')->name('services.store');
                Route::get('/delete/{id}', 'Services_Delete')->name('services.delete');
                Route::get('/status/{id}', 'Services_Status')->name('services.status');
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
