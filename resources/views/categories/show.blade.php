@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 740px;">

    <a href="{{ route('categories.index') }}" class="text-decoration-none text-white d-inline-flex align-items-center mb-4 link-dark">
        <svg class="me-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Back to category list
    </a>

    <header class="mb-4">
        <h1 class="display-5 fw-bold text-dark mb-3 tracking-tight">{{ $category->name }}</h1>

        <div class="d-flex flex-wrap align-items-center text-white gap-3">
            <span>Slug: <code class="text-dark fw-bold">{{ $category->slug }}</code></span>
            <span class="text-black-50">|</span>

            <span>Total Items:
                <strong class="text-dark">{{ $category->furniture->count() }}</strong>
            </span>
        </div>
    </header>

    <hr class="my-4 border-light opacity-100">

    <article class="fs-5 text-white lh-lg mb-5">
        @if($category->description)
            <h5 class="text-white fs-6">
                {{ $category->description }}
            </h5>
        @else
            <h5 class="text-white fs-6">
                No description provided for this category.
            </h5>
        @endif
    </article>

    @if($category->furniture->isNotEmpty())
        <section class="mb-5">
            <h4 class="text-white mb-3">Furniture in this Category</h4>

            <div class="list-group">
                @foreach($category->furniture as $item)
                    <a href="{{ route('furniture.show', $item->id) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">

                        <div>
                            <strong>{{ $item->name }}</strong><br>
                            <small class="text-muted">SKU: {{ $item->sku }}</small>
                        </div>

                        <span class="badge bg-dark">
                            ${{ number_format($item->price, 2) }}
                        </span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <footer class="border-top pt-3 text-white" style="font-size: 1rem;">
        <div class="row row-cols-1 row-cols-sm-2 g-2">
            <div>
                Created:
                <span class="text-dark fw-medium">
                    {{ $category->created_at->format('F d, Y \a\t g:i a') }}
                </span>
            </div>

            <div class="text-sm-end">
                Last updated:
                <span class="text-dark fw-medium">
                    {{ $category->updated_at->format('F d, Y \a\t g:i a') }}
                </span>
            </div>
        </div>
    </footer>

</div>
@endsection