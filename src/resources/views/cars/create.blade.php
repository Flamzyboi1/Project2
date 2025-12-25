@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Add New Vehicle</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Car Name</label>
                        <input type="text" name="car_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Manufacturer</label>
                            <select name="manufacturer_id" class="form-select" required>
                                <option value="">Select Manufacturer</option>
                                @foreach($manufacturers as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Car Type</label>
                            <select name="car_type_id" class="form-select" required>
                                <option value="">Select Type</option>
                                @foreach($carTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="2025" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image URL</label>
                            <input type="url" name="image" class="form-control" placeholder="https://...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Save Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection