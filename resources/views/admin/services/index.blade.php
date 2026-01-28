@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Services</h5>
    <a href="{{ route('admin.services.create') }}"
        class="btn btn-primary btn-sm">+ Add Service</a>
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
                        <th>Title</th>
                        <th>Status</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($service->image)
                            <img src="{{ asset('storage/'.$service->image) }}" height="40">
                            @endif
                        </td>
                        <td>{{ $service->title_en }}</td>
                        <!-- <td>
                        @if ($service->is_active)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td> -->
                        <td>
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>

                            <form method="POST"
                                action="{{ route('admin.services.destroy', $service) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus service ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection