@extends('layout')

@section('content')
<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h1 class="fw-bold text-dark">Cars Catalog</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('cars.create') }}" class="btn btn-primary px-4 shadow-sm">
                Add New Car
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 ps-4">ID</th>
                            <th class="py-3">Car Name</th>
                            <th class="py-3">Model</th>
                            <th class="py-3">Manufacturer</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                            <tr>
                                <td class="ps-4 text-muted fw-bold">{{ $car->id }}</td>
                                <td class="fw-bold text-primary">{{ $car->car_name }}</td>
                                <td>{{ $car->model }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $car->manufacturer->name ?? 'No Manufacturer' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-outline-primary px-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Delete this car?')" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-3">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No cars found. Start by adding one!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection