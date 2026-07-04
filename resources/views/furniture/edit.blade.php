@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 650px;">
    
    <h2 class="fw-bold text-dark mb-4 tracking-tight" style="font-size: 1.75rem;">Edit Furniture Item</h2>

    <form action="{{ route('furniture.update', $furniture->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="form-label fw-semibold text-light fw-medium" for="name">Item Name</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $furniture->name) }}" required>
            @error('name') 
                <div class="invalid-feedback fw-medium mt-1">
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-light fw-medium" for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $furniture->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') 
                <div class="invalid-feedback fw-medium mt-1">
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="row">
            <div class="col-sm-6 mb-4">
                <label class="form-label fw-semibold text-light fw-medium" for="sku">SKU</label>
                <input type="text" 
                       name="sku" 
                       id="sku" 
                       class="form-control @error('sku') is-invalid @enderror" 
                       value="{{ old('sku', $furniture->sku) }}" required>
                @error('sku') 
                    <div class="invalid-feedback fw-medium mt-1">
                        {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="col-sm-6 mb-4">
                <label class="form-label fw-semibold text-light fw-medium" for="price">Price ($)</label>
                <input type="number" 
                       name="price" 
                       id="price" 
                       step="0.01"
                       min="0"
                       class="form-control @error('price') is-invalid @enderror" 
                       value="{{ old('price', $furniture->price) }}" required>
                @error('price') 
                    <div class="invalid-feedback fw-medium mt-1">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-4">
                <label class="form-label fw-semibold text-light fw-medium" for="stock_quantity">Stock Quantity</label>
                <input type="number" 
                       name="stock_quantity" 
                       id="stock_quantity" 
                       min="0"
                       class="form-control @error('stock_quantity') is-invalid @enderror" 
                       value="{{ old('stock_quantity', $furniture->stock_quantity) }}" required>
                @error('stock_quantity') 
                    <div class="invalid-feedback fw-medium mt-1">
                        {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="col-sm-6 mb-4">
                <label class="form-label fw-semibold text-light fw-medium" for="status">Inventory Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="available" {{ old('status', $furniture->status) == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="out_of_stock" {{ old('status', $furniture->status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                    <option value="discontinued" {{ old('status', $furniture->status) == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                </select>
                @error('status') 
                    <div class="invalid-feedback fw-medium mt-1">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 pt-3 border-top mt-4">
            <button type="submit" class="btn btn-dark btn-sm px-4 py-2 fw-medium rounded-2">
                Update Furniture
            </button>
            <a href="{{ route('furniture.index') }}" class="text-decoration-none text-light fw-medium link-dark">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection