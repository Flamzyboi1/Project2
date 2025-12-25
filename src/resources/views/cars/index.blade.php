@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Car Inventory</h1>
    @auth
        <a href="{{ route('cars.create') }}" class="btn btn-success">Add New Car</a>
    @endauth
</div>

<div class="row">
    @forelse($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $car->image ?? 'https://via.placeholder.com/400x250?text=No+Image' }}" class="card-img-top" alt="{{ $car->car_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->car_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $car->model }} ({{ $car->year }})</h6>
                    <hr>
                    <p class="card-text">
                        <strong>Manufacturer:</strong> {{ $car->manufacturer->name ?? 'N/A' }}<br>
                        <strong>Type:</strong> {{ $car->carType->name ?? 'N/A' }}
                    </p>
                    <p class="card-text small text-secondary">{{ $car->description }}</p>
                </div>
                @auth
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Delete this car?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="alert alert-info">No cars found. Please run /populate-database.</p>
        </div>
    @endforelse
</div>
@endsection