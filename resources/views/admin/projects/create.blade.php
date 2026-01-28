@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Add Project</h5>

        <form method="POST"
            action="{{ route('admin.projects.store') }}"
            enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                {{-- CATEGORY --}}
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="project_category_id" class="form-select">
                        <option value="">-- No Category --</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">
                            {{ $cat->name_en }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- IMAGE --}}
                <div class="col-md-6">
                    <label class="form-label">Project Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                {{-- TITLE --}}
                <div class="col-md-6">
                    <label class="form-label">Title (ID)</label>
                    <input type="text" class="form-control" name="title_id" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Title (EN)</label>
                    <input type="text" class="form-control" name="title_en" required>
                </div>

                {{-- LOCATION --}}
                <div class="col-md-6">
                    <label class="form-label">Location (ID)</label>
                    <input type="text" class="form-control" name="location_id" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Location (EN)</label>
                    <input type="text" class="form-control" name="location_en" required>
                </div>

                {{-- SHORT DESC --}}
                <div class="col-md-6">
                    <label class="form-label">Short Description (ID)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_id"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Short Description (EN)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_en"></textarea>
                </div>

                {{-- EXCERPT --}}
                <div class="col-md-6">
                    <label class="form-label">Excerpt (ID)</label>
                    <textarea class="form-control" rows="4"
                        name="excerpt_id" required></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Excerpt (EN)</label>
                    <textarea class="form-control" rows="4"
                        name="excerpt_en" required></textarea>
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Project
                </button>
            </div>

        </form>

    </div>
</div>

@endsection