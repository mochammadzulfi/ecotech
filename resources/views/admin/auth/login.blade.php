@extends('admin.layouts.auth')

@section('content')
<div class="min-vh-100 d-flex">

    {{-- LEFT PANEL --}}
    <div class="d-none d-lg-flex flex-column justify-content-between p-5 text-white col-5"
        style="background: linear-gradient(135deg, #0f2167 0%, #1e3794 60%, #1a6fc4 100%);">

        <div>
            <img src="{{ asset('assets/images/logo.png') }}" height="40">
        </div>

        <div>
            <h2 class="fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                Manage your content <br> with ease.
            </h2>
            <p class="mb-0" style="opacity: .7; font-size: 15px;">
                EcoTech Services Admin Panel — your central hub for managing all website content.
            </p>
        </div>

        <div style="opacity: .4; font-size: 13px;">
            &copy; {{ date('Y') }} EcoTech Services. All rights reserved.
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="col d-flex align-items-center justify-content-center p-4"
        style="background: #f8f9fc;">

        <div style="width: 100%; max-width: 380px;">

            {{-- MOBILE LOGO --}}
            <div class="d-lg-none text-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" height="36">
            </div>

            <h4 class="fw-bold mb-1">Welcome back 👋</h4>
            <p class="text-muted mb-4" style="font-size: 14px;">
                Sign in to your admin account
            </p>

            {{-- ERROR --}}
            @if ($errors->any())
            <div class="alert alert-danger py-2 mb-3" style="font-size: 14px;">
                <i class="bi bi-exclamation-circle me-1"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label fw-medium" style="font-size: 14px;">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-envelope text-muted"></i>
                        </span>
                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control border-start-0 ps-0"
                            placeholder="admin@example.com"
                            required>
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label fw-medium" style="font-size: 14px;">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-lock text-muted"></i>
                        </span>
                        <input type="password"
                            name="password"
                            id="passwordInput"
                            class="form-control border-start-0 ps-0 border-end-0"
                            placeholder="••••••••"
                            required>
                        <span class="input-group-text bg-white border-start-0"
                            style="cursor:pointer"
                            onclick="togglePassword()">
                            <i class="bi bi-eye text-muted" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>

                {{-- REMEMBER --}}
                <div class="mb-4">
                    <div class="form-check mb-0">
                        <input type="checkbox"
                            name="remember"
                            class="form-check-input"
                            id="remember">
                        <label class="form-check-label text-muted"
                            for="remember"
                            style="font-size: 14px;">
                            Remember me
                        </label>
                    </div>
                </div>

                {{-- BUTTON --}}
                <button class="btn w-100 text-white fw-semibold py-2"
                    style="background: linear-gradient(135deg, #1e3794, #1a6fc4); border: none; border-radius: 10px; font-size: 15px;">
                    Sign In &nbsp;<i class="bi bi-arrow-right"></i>
                </button>

            </form>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        const icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>
@endsection