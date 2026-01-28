@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Project Categories</h5>
    <a href="{{ route('admin.project-categories.create') }}"
        class="btn btn-primary btn-sm">+ Add Category</a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name (EN)</th>
                        <th>Name (ID)</th>
                        <th>Slug</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name_en }}</td>
                        <td>{{ $cat->name_id }}</td>
                        <td>
                            <span class="text-muted">{{ $cat->slug }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.project-categories.edit', $cat) }}"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.project-categories.destroy', $cat) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus category ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if ($categories->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No categories found
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection