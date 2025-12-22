@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">Add New Car</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Car Name</label>
                        <input type="text" name="car_name" class="form-control" placeholder="e.g. Corolla" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Model</label>
                        <input type="text" name="model" class="form-control" placeholder="e.g. Sedan" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Manufacturer</label>
                        <select name="manufacturer_id" class="form-select" required>
                            <option value="" selected disabled>Select a Manufacturer</option>
                            @foreach($manufacturers as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Save Car Details</button>
                        <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection