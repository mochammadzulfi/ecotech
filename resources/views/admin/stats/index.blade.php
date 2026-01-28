@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Home Stats</h5>
    <a href="{{ route('admin.stats.create') }}" class="btn btn-primary btn-sm">
        + Add Stat
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
                        <th>Value</th>
                        <th>Label (ID)</th>
                        <th>Label (EN)</th>
                        <th>Order</th>
                        <th width="140">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stats as $stat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($stat->icon)
                            <img src="{{ asset('storage/'.$stat->icon) }}" height="28">
                            @endif
                        </td>
                        <td>{{ $stat->value }}</td>
                        <td>{{ $stat->label_id }}</td>
                        <td>{{ $stat->label_en }}</td>
                        <td>{{ $stat->order }}</td>
                        <td>
                            <a href="{{ route('admin.stats.edit', $stat) }}"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.stats.destroy', $stat) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus stat ini?')">
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