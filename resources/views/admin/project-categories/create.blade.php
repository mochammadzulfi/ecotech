@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Add Project Category</h5>

        <form method="POST"
            action="{{ route('admin.project-categories.store') }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Name (EN)</label>
                    <input class="form-control" name="name_en" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Name (ID)</label>
                    <input class="form-control" name="name_id" required>
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Category
                </button>
            </div>

        </form>

    </div>
</div>

@endsection