@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Certificates</h5>
    <a href="{{ route('admin.certificates.create') }}"
        class="btn btn-primary btn-sm">+ Add Certificate</a>
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
                        <th>Logo</th>
                        <th>Name</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$item->logo) }}"
                                height="40">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('admin.certificates.edit', $item) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>

                            <form method="POST"
                                action="{{ route('admin.certificates.destroy', $item) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete certificate?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if ($certificates->isEmpty())
                    <tr>
                        <td colspan="4"
                            class="text-center text-muted py-4">
                            No certificates
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection