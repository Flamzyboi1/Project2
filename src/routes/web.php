<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\AuthController;
use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\CarType;
use App\Models\User;

Route::get('/', [CarController::class, 'index']);
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');
Route::get('/car-types', [CarTypeController::class, 'index'])->name('car_types.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('cars', CarController::class)->except(['index']);
    Route::resource('manufacturers', ManufacturerController::class)->except(['index']);
    Route::resource('car-types', CarTypeController::class)->except(['index']);
});

Route::get('/populate-database', function () {
    Artisan::call('migrate:fresh --force');

    User::create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
    ]);

    $t1 = CarType::create(['name' => 'Sedan']);
    $t2 = CarType::create(['name' => 'Supercar']);

    $m1 = Manufacturer::create(['name' => 'Mercedes-Benz', 'address' => 'Germany']);
    $m2 = Manufacturer::create(['name' => 'Lamborghini', 'address' => 'Italy']);

    Car::create([
        'manufacturer_id' => $m1->id,
        'car_type_id' => $t1->id,
        'model' => 'S-Class',
        'car_name' => 'S-Class',
        'year' => 2024,
        'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=800',
        'description' => 'Luxury sedan.'
    ]);

    Car::create([
        'manufacturer_id' => $m2->id,
        'car_type_id' => $t2->id,
        'model' => 'Aventador',
        'car_name' => 'Aventador',
        'year' => 2023,
        'image' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=800',
        'description' => 'High-performance supercar.'
    ]);

    return "Database rebuilt and populated with 3 objects and admin user!";
});