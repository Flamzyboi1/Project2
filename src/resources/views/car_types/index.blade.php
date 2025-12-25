@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Car Types</h1>

    @if(Auth::check())
    <div class="card mb-4">
        <div class="card-header">Add New Car Type</div>
        <div class="card-body">
            <form action="{{ route('car-types.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Type name (e.g. Sedan, SUV)" required>
                    <button type="submit" class="btn btn-primary">Add Type</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                @if(Auth::check())
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                @if(Auth::check())
                <td>
                    <form action="{{ route('car-types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection