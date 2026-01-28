@extends('admin.layouts.app')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">

    <div class="card shadow-sm border-0" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <div class="text-center mb-3">
                <img src="{{ asset('assets/images/logo.png') }}" height="40">
            </div>


            <h5 class="text-center mb-4 fw-semibold">
                Admin Login
            </h5>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                        name="email"
                        class="form-control"
                        required>
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                        name="password"
                        class="form-control"
                        required>
                </div>

                {{-- REMEMBER --}}
                <div class="mb-3 form-check">
                    <input type="checkbox"
                        name="remember"
                        class="form-check-input"
                        id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                {{-- ERROR --}}
                @if ($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
                @endif

                {{-- BUTTON --}}
                <button class="btn btn-primary w-100">
                    Login
                </button>
            </form>

        </div>
    </div>

</div>
@endsection