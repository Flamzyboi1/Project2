<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('public');
});

Route::get('/data/cars', [DataController::class, 'getCars']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::resource('cars', CarController::class)->except(['index']);
    Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');
    Route::resource('manufacturers', ManufacturerController::class)->except(['index']);
    Route::get('/car-types', [CarTypeController::class, 'index'])->name('car_types.index');
    Route::resource('car-types', CarTypeController::class)->except(['index']);
});