@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Add Certificate</h5>

        <form method="POST"
            action="{{ route('admin.certificates.store') }}"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Certificate Name</label>
                <input class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" class="form-control" name="logo" required>
            </div>

            <div class="text-end">
                <button class="btn btn-primary">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

@endsection