@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0">Edit Car: {{ $car->car_name }}</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('cars.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Car Name</label>
                        <input type="text" name="car_name" class="form-control" value="{{ $car->car_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Model</label>
                        <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Manufacturer</label>
                        <select name="manufacturer_id" class="form-select" required>
                            @foreach($manufacturers as $m)
                                <option value="{{ $m->id }}" {{ $car->manufacturer_id == $m->id ? 'selected' : '' }}>
                                    {{ $m->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Update Car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection