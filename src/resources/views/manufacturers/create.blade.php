@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Manufacturer</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('manufacturers.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Manufacturer Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Toyota">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="e.g. Tokyo, Japan">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Manufacturer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection