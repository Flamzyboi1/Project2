<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
    public function index(): View
    {
        $cars = Car::with('manufacturer')->get();
        return view('cars.index', [
            'title' => 'Cars List',
            'cars' => $cars
        ]);
    }

    public function create(): View
    {
        $manufacturers = Manufacturer::all();
        return view('cars.create', [
            'title' => 'Add New Car',
            'manufacturers' => $manufacturers
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(string $id): View
    {
        $car = Car::findOrFail($id);
        $manufacturers = Manufacturer::all();
        return view('cars.edit', [
            'title' => 'Edit Car',
            'car' => $car,
            'manufacturers' => $manufacturers
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}