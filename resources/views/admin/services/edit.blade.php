@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">
            {{ isset($service) ? 'Edit Service' : 'Add Service' }}
        </h5>

        <form method="POST"
            enctype="multipart/form-data"
            action="{{ isset($service)
                ? route('admin.services.update', $service)
                : route('admin.services.store') }}">

            @csrf
            @isset($service) @method('PUT') @endisset

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Title (ID)</label>
                    <input class="form-control"
                        name="title_id"
                        value="{{ old('title_id', $service->title_id ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Title (EN)</label>
                    <input class="form-control"
                        name="title_en"
                        value="{{ old('title_en', $service->title_en ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Short Desc (ID)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_id">{{ old('short_desc_id', $service->short_desc_id ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Short Desc (EN)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_en">{{ old('short_desc_en', $service->short_desc_en ?? '') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description (ID)</label>
                    <textarea class="form-control" rows="4"
                        name="description_id">{{ old('description_id', $service->description_id ?? '') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description (EN)</label>
                    <textarea class="form-control" rows="4"
                        name="description_en">{{ old('description_en', $service->description_en ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check mt-4">
                        <input class="form-check-input"
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $service->is_active ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Active
                        </label>
                    </div>
                </div> -->

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Service
                </button>
            </div>

        </form>

    </div>
</div>

@endsection