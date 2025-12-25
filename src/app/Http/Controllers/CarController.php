<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\CarType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with(['manufacturer', 'carType'])->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();
        $carTypes = CarType::all();
        return view('cars.create', compact('manufacturers', 'carTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'car_type_id' => 'required|exists:car_types,id',
            'image' => 'nullable|url',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index');
    }

    public function edit(Car $car)
    {
        $manufacturers = Manufacturer::all();
        $carTypes = CarType::all();
        return view('cars.edit', compact('car', 'manufacturers', 'carTypes'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'car_name' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'car_type_id' => 'required|exists:car_types,id',
        ]);

        $car->update($request->all());

        return redirect()->route('cars.index');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}