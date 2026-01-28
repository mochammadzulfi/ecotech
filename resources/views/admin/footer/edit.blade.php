@extends('admin.layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Footer Content</h5>

        <form method="POST" action="{{ route('admin.footer.update') }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input class="form-control" name="company_name"
                        value="{{ $footer->company_name }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email"
                        value="{{ $footer->email }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input class="form-control" name="phone"
                        value="{{ $footer->phone }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Address (ID)</label>
                    <textarea class="form-control"
                        name="address_id">{{ $footer->address_id }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Address (EN)</label>
                    <textarea class="form-control"
                        name="address_en">{{ $footer->address_en }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">About (ID)</label>
                    <textarea class="form-control"
                        name="about_id">{{ $footer->about_id }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">About (EN)</label>
                    <textarea class="form-control"
                        name="about_en">{{ $footer->about_en }}</textarea>
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Footer
                </button>
            </div>

        </form>

    </div>
</div>

@endsection