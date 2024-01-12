<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\CoursesFeaturesController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TrainersController;

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
Route::get('/Trainer',[App\Http\Controllers\Website\TrainerController::class,'index'])->name('website.trainer');
Route::get('/Events',[App\Http\Controllers\Website\EventsController::class,'index'])->name('website.events');
Route::get('/Course',[App\Http\Controllers\Website\CourseController::class,'index'])->name('website.courses');
Route::get('/Details/{id}',[App\Http\Controllers\Website\CourseController::class,'show'])->name('website.course.details');



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

    # -------------------------------------Features--------------------------------
    Route::get('/features',[FeaturesController::class,'index'])->name('dashboard.features.index');
    Route::get('/features/create',[FeaturesController::class,'create'])->name('dashboard.features.create');
    Route::post('/features/store',[FeaturesController::class,'store'])->name('dashboard.features.store');
    Route::get('/features/edit/{id}',[FeaturesController::class,'edit'])->name('dashboard.features.edit');
    Route::post('/features/update/{id}', [FeaturesController::class, 'update'])->name('dashboard.features.update');
    Route::get('/features/delete/{id}',[FeaturesController::class, 'destroy'])->name('dashboard.features.delete');

    # -------------------------------------Courses--------------------------------
    Route::get('/courses',[CoursesController::class,'index'])->name('dashboard.courses.index');
    Route::get('/courses/create',[CoursesController::class,'create'])->name('dashboard.courses.create');
    Route::post('/courses/store',[CoursesController::class,'store'])->name('dashboard.courses.store');
    Route::get('/courses/show/{id}',[CoursesController::class,'show'])->name('dashboard.courses.show');
    Route::get('/courses/edit/{id}',[CoursesController::class,'edit'])->name('dashboard.courses.edit');
    Route::put('/courses/update/{id}', [CoursesController::class, 'update'])->name('dashboard.courses.update');
    Route::get('/courses/delete/{id}',[CoursesController::class, 'destroy'])->name('dashboard.courses.delete');

    # -------------------------------------Courses--------------------------------
    Route::get('/coursesfeatures/{id}',[CoursesFeaturesController::class,'index'])->name('dashboard.coursesfeatures.index');
    Route::get('/coursesfeatures/create/{id}',[CoursesFeaturesController::class,'create'])->name('dashboard.coursesfeatures.create');
    Route::post('/coursesfeatures/store/{id}',[CoursesFeaturesController::class,'store'])->name('dashboard.coursesfeatures.store');
    Route::get('/coursesfeatures/edit/{id}', [CoursesFeaturesController::class, 'edit'])->name('dashboard.coursesfeatures.edit');
    Route::put('/coursesfeatures/update/{id}', [CoursesFeaturesController::class, 'update'])->name('dashboard.coursesfeatures.update');
    Route::get('/coursesfeatures/delete/{id}',[CoursesFeaturesController::class, 'destroy'])->name('dashboard.coursesfeatures.delete');

    # -------------------------------------Trainers--------------------------------
    Route::get('/trainer',[TrainersController::class,'index'])->name('dashboard.trainer.index');
    Route::get('/trainer/create',[TrainersController::class,'create'])->name('dashboard.trainer.create');
    Route::post('/trainer/store',[TrainersController::class,'store'])->name('dashboard.trainer.store');
    Route::get('/trainer/edit/{id}',[TrainersController::class,'edit'])->name('dashboard.trainer.edit');
    Route::post('/trainer/update',[TrainersController::class,'update'])->name('dashboard.trainer.update');
    Route::get('/trainer/delete/{id}',[TrainersController::class, 'destroy'])->name('dashboard.trainer.delete');

    # -------------------------------------Events--------------------------------
    Route::get('/event',[EventsController::class,'index'])->name('dashboard.event.index');
    Route::get('/event/create',[EventsController::class,'create'])->name('dashboard.event.create');
    Route::post('/event/store',[EventsController::class,'store'])->name('dashboard.event.store');
    Route::get('/event/edit/{id}',[EventsController::class,'edit'])->name('dashboard.event.edit');
    Route::post('/event/update',[EventsController::class,'update'])->name('dashboard.event.update');
    Route::get('/event/delete/{id}',[EventsController::class, 'destroy'])->name('dashboard.event.delete');

    # -------------------------------------Package--------------------------------
    Route::get('/package/feature/index',[FeatureController::class,'index'])->name('dashboard.package.feature.index');
    Route::post('/package/feature/store',[FeatureController::class,'store'])->name('dashboard.package.feature.store');
    #package
    Route::get('/package/index',[PackageController::class,'index'])->name('dashboard.package.index');
    Route::get('/package/create',[PackageController::class,'create'])->name('dashboard.package.create');
    Route::post('/package/store',[PackageController::class,'store'])->name('dashboard.package.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
