@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">
            {{ isset($client) ? 'Edit Client' : 'Add Client' }}
        </h5>

        <form method="POST"
            enctype="multipart/form-data"
            action="{{ isset($client)
                ? route('admin.clients.update', $client)
                : route('admin.clients.store') }}">

            @csrf
            @isset($client) @method('PUT') @endisset

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Client Name (optional)</label>
                    <input class="form-control"
                        name="name"
                        value="{{ old('name', $client->name ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Logo</label>
                    <input type="file" class="form-control" name="logo">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

@endsection