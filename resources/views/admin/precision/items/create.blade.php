@extends('admin.layouts.app')

@section('content')
<h4 class="mb-4">Add Precision Item</h4>

<form method="POST" action="{{ route('admin.precision.items.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Label (ID)</label>
        <input type="text" name="label_id" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Label (EN)</label>
        <input type="text" name="label_en" class="form-control" required>
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="{{ route('admin.precision.edit') }}" class="btn btn-light">Cancel</a>
</form>
@endsection
