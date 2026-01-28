@extends('admin.layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">CTA Section</h5>

        <form method="POST"
            enctype="multipart/form-data"
            action="{{ route('admin.cta.update') }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Title (ID)</label>
                    <input class="form-control"
                        name="title_id"
                        value="{{ old('title_id', $cta->title_id) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Title (EN)</label>
                    <input class="form-control"
                        name="title_en"
                        value="{{ old('title_en', $cta->title_en) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Description (ID)</label>
                    <textarea class="form-control" rows="3"
                        name="desc_id">{{ old('desc_id', $cta->desc_id) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Description (EN)</label>
                    <textarea class="form-control" rows="3"
                        name="desc_en">{{ old('desc_en', $cta->desc_en) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Button Text (ID)</label>
                    <input class="form-control"
                        name="button_text_id"
                        value="{{ old('button_text_id', $cta->button_text_id) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Button Text (EN)</label>
                    <input class="form-control"
                        name="button_text_en"
                        value="{{ old('button_text_en', $cta->button_text_en) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Button Link</label>
                    <input class="form-control"
                        name="button_link"
                        value="{{ old('button_link', $cta->button_link) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Background Image</label>
                    <input type="file" class="form-control" name="background">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save CTA
                </button>
            </div>

        </form>

    </div>
</div>

@endsection