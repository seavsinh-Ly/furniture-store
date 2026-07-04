@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 740px;">

    <a href="{{ route('furniture.index') }}" class="text-decoration-none text-white d-inline-flex align-items-center mb-4 link-dark">
        <svg class="me-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Back to furniture list
    </a>

    <header class="mb-4">
        <h1 class="display-5 fw-bold text-dark mb-3 tracking-tight">{{ $furniture->name }}</h1>
        
        <div class="d-flex flex-wrap align-items-center text-white big gap-3">
            <span>Category: <strong class="text-dark">{{ $furniture->category->name }}</strong></span>
            <span class="text-black-50">|</span>
            
            <span>SKU: <code class="text-dark fw-bold">{{ $furniture->sku }}</code></span>
            <span class="text-black-50">|</span>

            <span>Price: <strong class="text-dark">${{ number_format($furniture->price, 2) }}</strong></span>
            <span class="text-black-50">|</span>

            <span>Stock: <strong class="text-dark">{{ $furniture->stock_quantity }} units</strong></span>
            <span class="text-black-50">|</span>
            
            @if($furniture->status === 'available')
                <span class="badge bg-success-subtle text-dark border border-success rounded-1 text-uppercase px-2 py-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                    Available
                </span>
            @elseif($furniture->status === 'out_of_stock')
                <span class="badge bg-warning-subtle text-dark border border-warning rounded-1 text-uppercase px-2 py-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                    Out of Stock
                </span>
            @else
                <span class="badge bg-danger-subtle text-dark border border-danger rounded-1 text-uppercase px-2 py-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                    Discontinued
                </span>
            @endif
        </div>
    </header>

    <hr class="my-4 border-light opacity-100">

    <article class="fs-5 text-white lh-lg mb-5">
        <h5 class="text-white fs-6">
            This item belongs to the <strong>{{ $furniture->category->name }}</strong> department. 
            @if($furniture->status === 'available' && $furniture->stock_quantity > 0)
                It is currently ready for immediate dispatch.
            @endif
        </h5>
    </article>

    <footer class="border-top pt-3 text-white" style="font-size: 1rem;">
        <div class="row row-cols-1 row-cols-sm-2 g-2">
            <div>Added to inventory: <span class="text-dark fw-medium">{{ $furniture->created_at->format('F d, Y \a\t g:i a') }}</span></div>
            <div class="text-sm-end">Last updated: <span class="text-dark fw-medium">{{ $furniture->updated_at->format('F d, Y \a\t g:i a') }}</span></div>
        </div>
    </footer>

</div>
@endsection