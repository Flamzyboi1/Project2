@extends('layout')

@section('content')
<div class="py-5 text-center">
    <div class="card shadow-sm p-5 bg-white">
        <h1 class="display-4 fw-bold text-dark">Welcome to the Car Manufacturer Catalog!</h1>
        <p class="lead mt-3">This is the official project for managing automotive manufacturers.</p>
        <hr class="my-4">
        <div class="d-grid gap-2 d-md-block">
            <a href="{{ route('manufacturers.index') }}" class="btn btn-primary btn-lg px-4">View All Manufacturers</a>
        </div>
    </div>
</div>
@endsection