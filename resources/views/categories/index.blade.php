@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 1100px;">

    <div class="d-flex justify-content-between align-items-center mb-4 bg-success bg-gradient p-3 rounded-3 shadow-sm">
        <h2 class="fw-bold text-white m-0 tracking-tight border-bottom border-white" style="font-size: 1.75rem;">Furniture Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-dark text-white btn-sm px-3 py-2 fw-medium rounded-2 d-inline-flex align-items-center">
            <svg class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Category
        </a>
    </div>

    @if($categories->count() > 0)
        <div class="table-responsive bg-white border rounded-3 shadow-sm">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success text-uppercase">
                    <tr>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600; width: 80px;">ID</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Category Name</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">URL Slug</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Description</th>
                        <th scope="col" class="px-4 py-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600; width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="px-4 py-3 text-secondary font-monospace" style="font-size: 0.875rem;">{{ $category->id }}</td>
                            
                            <td class="px-4 py-3 fw-semibold text-dark">{{ $category->name }}</td>
                            
                            <td class="px-4 py-3 text-primary font-monospace" style="font-size: 0.875rem;">/{{ $category->slug }}</td>
                            
                            <td class="px-4 py-3 text-secondary" style="font-size: 0.9rem;">
                                {{ $category->description ? Str::limit($category->description, 60, '...') : 'No description provided.' }}
                            </td>
                            
                            <td class="text-center align-middle px-4">
                                <div class="btn-group" role="group" aria-label="Category Actions">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-outline-secondary px-3">
                                        View
                                    </a>
                                    
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary px-3">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Warning: Deleting this category will delete all furniture items assigned to it! Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-3 rounded-end">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5 px-3 bg-light border border-dashed rounded-3 shadow-sm">
            <p class="text-muted mb-3 fs-5">No categories have been created yet.</p>
            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm px-4 py-2 fw-medium rounded-2">
                Create your first category
            </a>
        </div>
    @endif

</div>
@endsection