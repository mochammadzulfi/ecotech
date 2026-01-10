<section class="certificate-section section-space">
    <h3 class="section-title text-center">{{ __('general.certificate') }}</h3>

    <div class="container mt-4">
        <div class="row justify-content-center align-items-center g-4">
            @foreach ($certificates as $cert)
            <div class="col-6 col-md-2 text-center">
                <img src="{{ asset('storage/'.$cert->logo) }}"
                    alt="{{ $cert->name }}"
                    class="certificate-logo">
            </div>
            @endforeach
        </div>
    </div>
</section>