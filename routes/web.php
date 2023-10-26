<?php

use App\Http\Controllers\Admin\CarController;
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
    Route::get('cars/edit{id}', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::post('cars/update{id}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('cars/destroy/{id}', [CarController::class, 'destroy']);
});

Route::get('/', function () {
    return view('front.search');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
