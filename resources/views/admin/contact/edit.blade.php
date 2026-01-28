@extends('admin.layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Contact Information</h5>

        <form method="POST" action="{{ route('admin.contact.update') }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email"
                        value="{{ $contact->email }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">WhatsApp</label>
                    <input class="form-control" name="phone"
                        value="{{ $contact->phone }}">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Google Maps Link</label>
                    <input class="form-control" name="map_embed"
                        value="{{ $contact->map_embed }}">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Save Contact
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
