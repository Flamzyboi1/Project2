@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manufacturers</h1>
    </div>

    @auth
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">Add New Manufacturer</div>
        <div class="card-body">
            <form action="{{ route('manufacturers.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" placeholder="Manufacturer Name (e.g. BMW)" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="address" class="form-control" placeholder="Country/Address" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth

    <div class="table-responsive">
        <table class="table table-hover border">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Manufacturer Name</th>
                    <th>Location</th>
                    @auth <th>Actions</th> @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($manufacturers as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td><strong>{{ $m->name }}</strong></td>
                    <td>{{ $m->address }}</td>
                    @auth
                    <td>
                        <form action="{{ route('manufacturers.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Delete this manufacturer and all their cars?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No manufacturers found. Please visit /populate-database</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection