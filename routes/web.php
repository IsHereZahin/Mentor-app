<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\HomeControllor;
use App\Http\Controllers\Admin\DashboardControllor;
use App\Http\Controllers\Admin\HeroControllor;

use App\Http\Controllers\Admin\AboutController;

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

Route::get('/',[HomeControllor::class,'index'])->name('website.home');



// ------------------------------------------Admin routes --------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    # ---------------------------------------dashboard -----------------------------------
    Route::get('/dashboard',[DashboardControllor::class,'index'])->name('dashboard');
    # ---------------------------------------Hero -----------------------------------
    Route::get('/hero',[HeroControllor::class,'index'])->name('dashboard.hero');
    Route::get('/hero/create',[HeroControllor::class,'create'])->name('dashboard.hero.create');
    Route::post('/hero/store',[HeroControllor::class,'store'])->name('dashboard.hero.store');
    Route::get('/hero/edit',[HeroControllor::class,'edit'])->name('dashboard.hero.edit');
    Route::post('/hero/update',[HeroControllor::class,'update'])->name('dashboard.hero.update');

    # -------------------------------------About ------------------------------------
    Route::get('/about',[AboutController::class,'index'])->name('dashboard.about');
    Route::get('/about/create',[AboutController::class,'create'])->name('dashboard.about.create');
    Route::post('/about/store',[AboutController::class,'store'])->name('dashboard.about.store');
    Route::get('/about/edit',[AboutController::class,'edit'])->name('dashboard.about.edit');
    Route::post('/about/update',[AboutController::class,'update'])->name('dashboard.about.update');
    Route::get('/about/delete',[AboutController::class, 'destroy'])->name('dashboard.about.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
