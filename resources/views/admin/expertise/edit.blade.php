@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">
            {{ isset($expertise) ? 'Edit Expertise' : 'Add Expertise' }}
        </h5>

        <form method="POST"
            enctype="multipart/form-data"
            action="{{ isset($expertise)
                ? route('admin.expertise.update', $expertise)
                : route('admin.expertise.store') }}">

            @csrf
            @isset($expertise) @method('PUT') @endisset

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Title (ID)</label>
                    <input class="form-control"
                        name="title_id"
                        value="{{ old('title_id', $expertise->title_id ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Title (EN)</label>
                    <input class="form-control"
                        name="title_en"
                        value="{{ old('title_en', $expertise->title_en ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Description (ID)</label>
                    <textarea class="form-control" rows="3"
                        name="desc_id">{{ old('desc_id', $expertise->desc_id ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Description (EN)</label>
                    <textarea class="form-control" rows="3"
                        name="desc_en">{{ old('desc_en', $expertise->desc_en ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Icon</label>
                    <input type="file" class="form-control" name="icon">
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