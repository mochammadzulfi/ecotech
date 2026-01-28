@extends('admin.layouts.app')

@section('content')
<h4 class="mb-4">Edit Precision Item</h4>

<form method="POST"
    action="{{ route('admin.precision.items.update', $item) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Label (ID)</label>
        <input type="text"
            name="label_id"
            class="form-control"
            value="{{ old('label_id', $item->label_id) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Label (EN)</label>
        <input type="text"
            name="label_en"
            class="form-control"
            value="{{ old('label_en', $item->label_en) }}"
            required>
    </div>

    <button class="btn btn-primary">
        Update
    </button>
</form>

@endsection