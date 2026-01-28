@extends('admin.layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- SECTION --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-semibold mb-3">Precision Section</h5>

        <form method="POST" action="{{ route('admin.precision.update') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title (ID)</label>
                    <input class="form-control"
                        name="title_id"
                        value="{{ $section->title_id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Title (EN)</label>
                    <input class="form-control"
                        name="title_en"
                        value="{{ $section->title_en }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Subtitle (ID)</label>
                    <textarea class="form-control"
                        name="subtitle_id">{{ $section->subtitle_id }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Subtitle (EN)</label>
                    <textarea class="form-control"
                        name="subtitle_en">{{ $section->subtitle_en }}</textarea>
                </div>
            </div>

            <div class="mt-3 text-end">
                <button class="btn btn-primary">Save Section</button>
            </div>
        </form>
    </div>
</div>

{{-- ITEMS --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-semibold mb-0">Precision Items</h5>
            <a href="{{ route('admin.precision.items.create') }}"
                class="btn btn-sm btn-primary">+ Add Item</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($section->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->label_id }} / {{ $item->label_en }}</td>
                        <td>
                            <a href="{{ route('admin.precision.items.edit', $item) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>

                            <form method="POST"
                                action="{{ route('admin.precision.items.destroy', $item) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus item?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection