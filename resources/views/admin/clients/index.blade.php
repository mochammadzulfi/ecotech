@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Client Logo</h5>
    <a href="{{ route('admin.clients.create') }}"
        class="btn btn-primary btn-sm">
        + Add Client
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
                        <th>Logo</th>
                        <th>Name</th>
                        <th width="140">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$client->logo) }}" height="40">
                        </td>
                        <td>{{ $client->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.clients.edit', $client) }}"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.clients.destroy', $client) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus client ini?')">
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