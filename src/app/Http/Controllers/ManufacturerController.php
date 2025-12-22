<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ManufacturerController extends Controller
{
    public function index(): View
    {
        $manufacturers = Manufacturer::all();
        return view('manufacturers.index', [
            'title' => 'Manufacturers List',
            'manufacturers' => $manufacturers
        ]);
    }

    public function create(): View
    {
        return view('manufacturers.create', [
            'title' => 'Add New Manufacturer'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Manufacturer::create($request->all());

        return redirect()->route('manufacturers.index')
            ->with('success', 'Manufacturer created successfully.');
    }

    public function edit(string $id): View
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('manufacturers.edit', [
            'title' => 'Edit Manufacturer',
            'manufacturer' => $manufacturer
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->all());

        return redirect()->route('manufacturers.index')
            ->with('success', 'Manufacturer updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();

        return redirect()->route('manufacturers.index')
            ->with('success', 'Manufacturer deleted successfully.');
    }
}