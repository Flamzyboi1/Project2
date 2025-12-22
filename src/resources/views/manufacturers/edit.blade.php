@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0">Edit Manufacturer: {{ $manufacturer->name }}</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Manufacturer Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $manufacturer->name }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $manufacturer->address }}" required>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('manufacturers.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Update Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection