@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Edit Certificate</h5>

        <form method="POST"
            action="{{ route('admin.certificates.update', $certificate) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Certificate Name</label>
                <input class="form-control"
                    name="name"
                    value="{{ $certificate->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" class="form-control" name="logo">

                <img src="{{ asset('storage/'.$certificate->logo) }}"
                    class="mt-2"
                    height="60">
            </div>

            <div class="text-end">
                <button class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>

@endsection