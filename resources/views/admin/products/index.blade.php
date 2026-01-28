@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Products</h5>
    <a href="{{ route('admin.products.create') }}"
        class="btn btn-primary btn-sm">+ Add Product</a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <img src="{{ asset('storage/'.$product->image) }}"
                                height="40" class="rounded">
                        </td>

                        <td>
                            <div class="fw-medium">{{ $product->name_en }}</div>
                            <small class="text-muted">{{ $product->name_id }}</small>
                        </td>

                        <td>
                            {{ $product->category?->name_en ?? '-' }}
                        </td>

                        <!-- <td>
                        @if ($product->is_featured)
                        <span class="badge bg-success">Yes</span>
                        @else
                        <span class="badge bg-secondary">No</span>
                        @endif
                    </td> -->

                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if ($products->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            No products found
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection