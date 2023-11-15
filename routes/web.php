<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HeroController;

use App\Http\Controllers\Website\HomeController;

use Illuminate\Support\Facades\Route;

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
// -----------------------------------------Websites routes-------------------------------
                                // Route::get('/', function () {
                                //     return view('welcome');
                                // });

Route::get('/',[HomeController::class,'index'])->name('website.home');
Route::get('/About',[App\Http\Controllers\Website\AboutController::class,'index'])->name('website.about');



// ------------------------------------------Admin routes --------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    # ---------------------------------------dashboard -----------------------------------
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    # ---------------------------------------Hero -----------------------------------
    Route::get('/hero',[HeroController::class,'index'])->name('dashboard.hero');
    Route::get('/hero/create',[HeroController::class,'create'])->name('dashboard.hero.create');
    Route::post('/hero/store',[HeroController::class,'store'])->name('dashboard.hero.store');
    Route::get('/hero/edit',[HeroController::class,'edit'])->name('dashboard.hero.edit');
    Route::post('/hero/update',[HeroController::class,'update'])->name('dashboard.hero.update');

    # -------------------------------------About ------------------------------------
    Route::get('/about',[AboutController::class,'index'])->name('dashboard.about');
    Route::get('/about/create',[AboutController::class,'create'])->name('dashboard.about.create');
    Route::post('/about/store',[AboutController::class,'store'])->name('dashboard.about.store');
    Route::get('/about/edit',[AboutController::class,'edit'])->name('dashboard.about.edit');
    Route::post('/about/update',[AboutController::class,'update'])->name('dashboard.about.update');
    Route::get('/about/delete',[AboutController::class, 'destroy'])->name('dashboard.about.delete');

    # -------------------------------------Testimonials--------------------------------
    Route::get('/testimonial',[TestimonialController::class,'index'])->name('dashboard.testimonial.index');
    Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('dashboard.testimonial.create');
    Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('dashboard.testimonial.store');
    Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('dashboard.testimonial.edit');
    Route::post('/testimonial/update',[TestimonialController::class,'update'])->name('dashboard.testimonial.update');
    Route::get('/testimonial/delete/{id}',[TestimonialController::class, 'destroy'])->name('dashboard.testimonial.delete');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
