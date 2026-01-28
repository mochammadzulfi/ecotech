@extends('admin.layouts.app')

@section('content')

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-primary fs-3">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div>
                    <div class="text-muted small">Services</div>
                    <h4 class="mb-0 fw-semibold">{{ $serviceCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-success fs-3">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <div class="text-muted small">Products</div>
                    <h4 class="mb-0 fw-semibold">{{ $productCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-warning fs-3">
                    <i class="bi bi-kanban"></i>
                </div>
                <div>
                    <div class="text-muted small">Projects</div>
                    <h4 class="mb-0 fw-semibold">{{ $projectCount }}</h4>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h6 class="fw-semibold mb-2">Welcome 👋</h6>
        <p class="text-muted mb-0">
            Gunakan menu di samping untuk mengelola konten website EcoTech.
        </p>
    </div>
</div>

@endsection