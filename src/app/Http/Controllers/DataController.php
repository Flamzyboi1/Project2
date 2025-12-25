<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    
    public function getTopCars(): JsonResponse
    {
        $cars = Car::inRandomOrder()->take(3)->get();
        return response()->json($cars);
    }

    
    public function getCar(Car $car): JsonResponse
    {
        return response()->json($car);
    }

    
    public function getRelatedCars(Car $car): JsonResponse
    {
        $cars = Car::where('id', '<>', $car->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return response()->json($cars);
    }
}