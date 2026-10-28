<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\public\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class , 'index'])->name('index');

Route::get('hero/', [FrontController::class , 'hero'])->name('home');

Route::get('about/', [FrontController::class , 'about'])->name('about');

Route::get('whyUs/', [FrontController::class , 'whyUs'])->name('whyUs');

Route::get('menu/', [FrontController::class , 'menu'])->name('menu');

Route::get('specials/', [FrontController::class , 'specials'])->name('specials');
Route::get('gallery/', [FrontController::class , 'gallery'])->name('gallery');

Route::get('events/', [FrontController::class , 'events'])->name('events');

Route::get('testimonials/', [FrontController::class , 'testimonials'])->name('testimonials');

Route::get('book-a-table/', [FrontController::class , 'book_a_table'])->name('book-a-table');

Route::get('chefs/', [FrontController::class , 'chefs'])->name('chefs');
Route::get('contact/', [FrontController::class , 'contact'])->name('contact');






//Route :: middleware('auth')->group(function() {
//
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//
//});
//


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('heroes', HeroController::class);
    });
});

require __DIR__.'/auth.php';
