@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Home – Hero Section</h5>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" enctype="multipart/form-data"
            action="{{ route('admin.home.update') }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Hero Title (ID)</label>
                    <input class="form-control"
                        name="hero_title_id"
                        value="{{ old('hero_title_id', $content->hero_title_id) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Hero Title (EN)</label>
                    <input class="form-control"
                        name="hero_title_en"
                        value="{{ old('hero_title_en', $content->hero_title_en) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Subtitle (ID)</label>
                    <textarea class="form-control" rows="3"
                        name="hero_subtitle_id">{{ old('hero_subtitle_id', $content->hero_subtitle_id) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Subtitle (EN)</label>
                    <textarea class="form-control" rows="3"
                        name="hero_subtitle_en">{{ old('hero_subtitle_en', $content->hero_subtitle_en) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">CTA Text (ID)</label>
                    <input class="form-control"
                        name="hero_cta_text_id"
                        value="{{ old('hero_cta_text_id', $content->hero_cta_text_id) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">CTA Text (EN)</label>
                    <input class="form-control"
                        name="hero_cta_text_en"
                        value="{{ old('hero_cta_text_en', $content->hero_cta_text_en) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">CTA Link</label>
                    <input class="form-control"
                        name="hero_cta_link"
                        value="{{ old('hero_cta_link', $content->hero_cta_link) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Hero Image</label>
                    <input type="file" class="form-control" name="hero_image">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Changes
                </button>
            </div>

        </form>

    </div>
</div>

@endsection