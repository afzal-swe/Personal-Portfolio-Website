<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\PortfolioController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.layouts.main')->name('home');
// });

Route::get('/', [HomeController::class, 'Home_Page'])->name('home');

Route::get('/about', [AboutController::class, 'About'])->name('about');
Route::get('/blog', [BlogController::class, 'Blog'])->name('blog');
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('/services', [ServicesController::class, 'Services'])->name('services');


Route::group(['prefix' => '/'], function () {
    // Portfolio Route Section
    Route::group(['prefix' => 'portfolio'], function () {
        Route::controller(PortfolioController::class)->group(function () {
            Route::get('/', 'Portfolio')->name('portfolio');
            Route::get('/details/{id}', 'Portfolio_Details')->name('project_portfolio_details');
        });
    }); //End Route
}); //End Route

require __DIR__ . '/auth.php';
