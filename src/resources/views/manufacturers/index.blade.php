@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h1 class="fw-bold text-dark">Manufacturers List</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('manufacturers.create') }}" class="btn btn-primary px-4 shadow-sm">
                Add New Manufacturer
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
                            <th class="py-3 ps-4" style="width: 10%">ID</th>
                            <th class="py-3" style="width: 35%">Manufacturer Name</th>
                            <th class="py-3" style="width: 35%">Headquarters Address</th>
                            <th class="py-3 text-center" style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($manufacturers as $m)
                            <tr>
                                <td class="ps-4 text-muted fw-bold">{{ $m->id }}</td>
                                <td class="fw-bold">{{ $m->name }}</td>
                                <td>{{ $m->address }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('manufacturers.edit', $m->id) }}" class="btn btn-sm btn-outline-primary px-3">
                                            Edit
                                        </a>
                                        
                                        <form action="{{ route('manufacturers.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Delete this manufacturer?')" class="m-0">
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
                                <td colspan="4" class="text-center py-5 text-muted">
                                    No manufacturers found in the database.
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