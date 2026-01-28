@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">
            {{ isset($stat) ? 'Edit Stat' : 'Add Stat' }}
        </h5>

        <form method="POST"
            enctype="multipart/form-data"
            action="{{ isset($stat)
                    ? route('admin.stats.update', $stat)
                    : route('admin.stats.store') }}">

            @csrf
            @isset($stat) @method('PUT') @endisset

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Value</label>
                    <input class="form-control"
                        name="value"
                        value="{{ old('value', $stat->value ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Label (ID)</label>
                    <input class="form-control"
                        name="label_id"
                        value="{{ old('label_id', $stat->label_id ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Label (EN)</label>
                    <input class="form-control"
                        name="label_en"
                        value="{{ old('label_en', $stat->label_en ?? '') }}">
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