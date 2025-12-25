<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller {
    public function index() {
        $types = CarType::all();
        return view('car_types.index', compact('types'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:car_types,name']);
        CarType::create($request->all());
        return redirect()->back();
    }

    public function destroy(CarType $carType) {
        $carType->delete();
        return redirect()->back();
    }
}