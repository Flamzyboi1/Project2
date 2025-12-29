<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    public function getCars(): JsonResponse
    {
        return response()->json(Car::with(['manufacturer', 'carType'])->get());
    }
}