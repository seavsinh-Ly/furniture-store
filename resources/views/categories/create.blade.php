@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 650px;">
    
    <h2 class="fw-bold text-dark mb-4 tracking-tight" style="font-size: 1.75rem;">Add New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="form-label fw-semibold text-light fw-medium" for="name">Category Name</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback fw-medium mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-light fw-medium" for="description">Description</label>
            <textarea name="description" 
                      id="description" 
                      rows="5" 
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback fw-medium mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 pt-3 border-top mt-4">
            <button type="submit" class="btn btn-dark btn-sm px-4 py-2 fw-medium rounded-2">
                Save Category
            </button>
            <a href="{{ route('categories.index') }}" class="text-decoration-none text-light fw-medium link-dark">
                Cancel
            </a>
        </div>
        
    </form>
</div>
@endsection