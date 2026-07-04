@extends('layout')

@section('content')
<div class="container my-5" style="max-width: 1100px;">

    <div class="d-flex justify-content-between align-items-center mb-4 bg-success bg-gradient p-3 rounded-3 shadow-sm">
        <h2 class="fw-bold text-white m-0 tracking-tight border-bottom border-white" style="font-size: 1.75rem;">Furniture Management List</h2>
        <a href="{{ route('furniture.create') }}" class="btn btn-dark text-white btn-sm px-3 py-2 fw-medium rounded-2 d-inline-flex align-items-center">
            <svg class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Furniture Item
        </a>
    </div>

    @if($furniture->count() > 0)
        <div class="table-responsive bg-white border rounded-3 shadow-sm">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success text-uppercase">
                    <tr>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">SKU</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Name</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Category</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Price</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Stock Qty</th>
                        <th scope="col" class="px-4 py-3" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Status</th>
                        <th scope="col" class="px-4 py-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600; width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($furniture as $item)
                        <tr>
                            <td class="px-4 py-3 text-secondary font-monospace" style="font-size: 0.875rem;">{{ $item->sku }}</td>
                            
                            <td class="px-4 py-3 fw-semibold text-dark">{{ $item->name }}</td>
                            
                            <td class="px-4 py-3 text-dark">{{ $item->category->name ?? 'Uncategorized' }}</td>
                            
                            <td class="px-4 py-3 text-dark fw-medium">${{ number_format($item->price, 2) }}</td>
                            
                            <td class="px-4 py-3 text-dark">{{ $item->stock_quantity }} units</td>
                            
                            <td class="px-4 py-3">
                                @if($item->status === 'available')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill">Available</span>
                                @elseif($item->status === 'out_of_stock')
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-pill">Out of Stock</span>
                                @else
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 rounded-pill">Discontinued</span>
                                @endif
                            </td>
                            
                            <td class="text-center align-middle px-4">
                                <div class="btn-group" role="group" aria-label="Furniture Actions">
                                    <a href="{{ route('furniture.show', $item->id) }}" class="btn btn-sm btn-outline-secondary px-3">
                                        View
                                    </a>
                                    
                                    <a href="{{ route('furniture.edit', $item->id) }}" class="btn btn-sm btn-outline-primary px-3">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('furniture.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
            <p class="text-muted mb-3 fs-5">Your inventory is completely empty.</p>
            <a href="{{ route('furniture.create') }}" class="btn btn-success btn-sm px-4 py-2 fw-medium rounded-2">
                Add your first piece of furniture
            </a>
        </div>
    @endif

</div>
@endsection