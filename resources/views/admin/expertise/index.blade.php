@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Home Expertise</h5>
    <a href="{{ route('admin.expertise.create') }}"
        class="btn btn-primary btn-sm">
        + Add Expertise
    </a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Icon</th>
                        <th>Title (ID)</th>
                        <th>Title (EN)</th>
                        <th width="140">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expertises as $exp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($exp->icon)
                            <img src="{{ asset('storage/'.$exp->icon) }}" height="32">
                            @endif
                        </td>
                        <td>{{ $exp->title_id }}</td>
                        <td>{{ $exp->title_en }}</td>
                        <td>
                            <a href="{{ route('admin.expertise.edit', $exp) }}"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.expertise.destroy', $exp) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus expertise ini?')">
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