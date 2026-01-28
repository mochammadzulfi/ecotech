@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Projects</h5>
    <a href="{{ route('admin.projects.create') }}"
        class="btn btn-primary btn-sm">+ Add Project</a>
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
                        <th>Category</th>
                        <th>Location</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$project->image) }}"
                                height="40" class="rounded">
                        </td>
                        <td>
                            <div class="fw-medium">{{ $project->title_en }}</div>
                            <small class="text-muted">{{ $project->title_id }}</small>
                        </td>
                        <td>{{ $project->category?->name_en ?? '-' }}</td>
                        <td>{{ $project->location_en }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>

                            <form method="POST"
                                action="{{ route('admin.projects.destroy', $project) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete project ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if ($projects->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No projects found
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection