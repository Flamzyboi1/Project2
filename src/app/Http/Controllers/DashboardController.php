<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carCount = Car::count();
        $manufacturerCount = Manufacturer::count();
        $userCount = User::count();

        return view('dashboard', compact('carCount', 'manufacturerCount', 'userCount'));
    }
}