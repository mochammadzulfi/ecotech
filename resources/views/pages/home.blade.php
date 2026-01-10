@extends('layouts.app')

@section('title', __('general.home'))

@section('content')
<section class="hero-section" style="background-image: url('{{ $content && $content->hero_image
        ? asset('storage/' . $content->hero_image)
        : asset('assets/images/hero-default.jpg') }}');">

    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content text-center">
            <h1 data-aos="fade-up">
                {{ $content->{'hero_title_' . app()->getLocale()} }}
            </h1>

            <p data-aos="fade-up" data-aos-delay="150">
                {{ $content->{'hero_subtitle_' . app()->getLocale()} }}
            </p>

            <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">
                <a href="#" class="btn btn-primary">
                    {{ __('general.cta_quote') }}
                </a>

                <a href="/{{ app()->getLocale() }}/services" class="btn btn-outline-light">
                    {{ __('general.cta_services') }}
                </a>
            </div>

        </div>
    </div>
</section>

@include('components.stats', ['stats' => $stats])

<section class="client-section mt-4">
    <h4 class="section-title text-center">{{ __('general.home_client') }}</h4>

    <div class="container mt-4">

        @if ($clients->count() > 4)
        {{-- AUTO SCROLL --}}
        <div class="client-slider">
            <div class="client-track">
                @foreach ($clients as $client)
                <div class="client-item">
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                </div>
                @endforeach

                {{-- DUPLIKASI UNTUK LOOP --}}
                @foreach ($clients as $client)
                <div class="client-item">
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                </div>
                @endforeach
            </div>
        </div>
        @else
        {{-- STATIC GRID --}}
        <div class="row justify-content-center align-items-center g-4">
            @foreach ($clients as $client)
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('storage/' . $client->logo) }}" class="client-logo" alt="{{ $client->name }}">
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

<section class="expertise-section">
    <h4 class="section-title text-center mt-4">{{ __('general.home_expertise') }}</h4>
    <p class="text-center text-muted">{{ __('general.home_core') }}</p>

    <div class="container">
        <div class="row g-4">
            @foreach ($expertises as $exp)
            <div class="col-md-4" data-aos="zoom-in">
                <div class="expertise-card">
                    <div class="expertise-content">
                        <img src="{{ asset('storage/' . $exp->icon) }}" class="expertise-icon">
                        <h4>{{ $exp->{'title_' . app()->getLocale()} }}</h4>
                        <p>{{ $exp->{'desc_' . app()->getLocale()} }}</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="precision-section">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- IMAGE --}}
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $precision->image) }}" class="img-fluid precision-image" alt="Precision">
            </div>

            {{-- CONTENT --}}
            <div class="col-md-6">
                <h3 class="precision-title">
                    {{ $precision->{'title_' . app()->getLocale()} }}
                </h3>

                <p class="precision-desc">
                    {{ $precision->{'desc_' . app()->getLocale()} }}
                </p>

                <ul class="precision-list">
                    @foreach ($precision->items as $item)
                    <li>
                        <span class="check-icon">✓</span>
                        {{ $item->{'label_' . app()->getLocale()} }}
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>

<section class="project-section section-space mt-4">
    <h3 class="section-title text-center">{{ __('general.home_recent_project') }}</h3>
    <p class="section-subtitle text-center">
        {{ __('general.home_recent_project_delivering') }}
    </p>

    <div class="container mt-5">

        @if ($projects->count() > 4)
        {{-- AUTO SCROLL MODE --}}
        <div class="project-slider">
            <div class="project-track">
                @foreach ($projects as $project)
                @include('components.project-card', ['project' => $project])
                @endforeach

                {{-- DUPLIKASI UNTUK LOOP --}}
                @foreach ($projects as $project)
                @include('components.project-card', ['project' => $project])
                @endforeach
            </div>
        </div>
        @else
        {{-- STATIC GRID MODE --}}
        <div class="row g-4">
            @foreach ($projects as $project)
            <div class="col-md-3 col-sm-6">
                @include('components.project-card', ['project' => $project])
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-5">
            <a href="/{{ app()->getLocale() }}/portfolio"
                class="btn btn-primary">
                {{ __('general.all_portfolio') }}
            </a>
        </div>

    </div>
</section>

@include('components.certificate', ['certificates' => $certificates])

<section class="cta-section">
    <div class="container text-center">
        <h2 class="cta-title">
            {{ $cta->{'title_'.app()->getLocale()} }}
        </h2>

        <p class="cta-desc">
            {{ $cta->{'desc_'.app()->getLocale()} }}
        </p>

        <div class="cta-actions">
            <a href="tel:+628xxxxxxxxx" class="btn btn-outline-primary">
                {{ $cta->{'btn_primary_'.app()->getLocale()} }}
            </a>

            <a href="/{{ app()->getLocale() }}/services"
                class="btn btn-primary">
                {{ $cta->{'btn_secondary_'.app()->getLocale()} }}
            </a>
        </div>
    </div>
</section>

@endsection