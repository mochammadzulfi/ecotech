@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Edit Project Category</h5>

        <form method="POST"
            action="{{ route('admin.project-categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Name (EN)</label>
                    <input class="form-control"
                        name="name_en"
                        value="{{ $category->name_en }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Name (ID)</label>
                    <input class="form-control"
                        name="name_id"
                        value="{{ $category->name_id }}">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Update Category
                </button>
            </div>

        </form>

    </div>
</div>

@endsection