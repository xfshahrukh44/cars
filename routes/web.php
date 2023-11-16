<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarImageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MakeController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\FrontController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ADMIN ROUTES
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->middleware('guest')->name('admin.login');

Route::namespace('App\Http\Controllers\Admin')->prefix('/admin')->middleware('admin')->group(function () {
    //Dashboard
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    //car
    Route::get('cars', [CarController::class, 'index'])->name('admin.cars');
    Route::get('cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('cars/store', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('cars/edit/{id}', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::post('cars/update/{id}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('cars/destroy/{id}', [CarController::class, 'destroy']);

    //car_image
    Route::get('cars-image/destroy/{id}', [CarImageController::class, 'destroy'])->name('admin.car-images.destroy');

    //make
    Route::get('makes', [MakeController::class, 'index'])->name('admin.makes');
    Route::get('makes/create', [MakeController::class, 'create'])->name('admin.makes.create');
    Route::post('makes/store', [MakeController::class, 'store'])->name('admin.makes.store');
    Route::get('makes/edit/{id}', [MakeController::class, 'edit'])->name('admin.makes.edit');
    Route::post('makes/update/{id}', [MakeController::class, 'update'])->name('admin.makes.update');
    Route::delete('makes/destroy/{id}', [MakeController::class, 'destroy']);

    //model
    Route::get('models', [ModelController::class, 'index'])->name('admin.models');
    Route::get('models/create', [ModelController::class, 'create'])->name('admin.models.create');
    Route::post('models/store', [ModelController::class, 'store'])->name('admin.models.store');
    Route::get('models/edit/{id}', [ModelController::class, 'edit'])->name('admin.models.edit');
    Route::post('models/update/{id}', [ModelController::class, 'update'])->name('admin.models.update');
    Route::delete('models/destroy/{id}', [ModelController::class, 'destroy']);

    //location
    Route::get('locations', [LocationController::class, 'index'])->name('admin.locations');
    Route::get('locations/create', [LocationController::class, 'create'])->name('admin.locations.create');
    Route::post('locations/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('locations/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('locations/update/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::delete('locations/destroy/{id}', [LocationController::class, 'destroy']);
});

Route::get('/', [FrontController::class, 'search'])->name('front.search');
Route::get('/iframe/search-form', [FrontController::class, 'iframeSearchForm'])->name('front.iframeSearchForm');
Route::get('car/detail/{slug}', [FrontController::class, 'carDetail'])->name('front.carDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/temp', function () {
    foreach (Car::whereNull('slug')->get() as $car) {
        $car->slug = get_car_slug($car->title);
        $car->save();
    }
});
