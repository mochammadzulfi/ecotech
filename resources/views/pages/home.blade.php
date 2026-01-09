@extends('layouts.app')

@section('title', __('general.home'))

@section('content')
<section class="hero-section"
    style="background-image: url('{{ $content && $content->hero_image
        ? asset('storage/'.$content->hero_image)
        : asset('assets/images/hero-default.jpg') }}');">

    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content text-center">
            <h1>
                {{ $content->{'hero_title_'.app()->getLocale()} }}
            </h1>

            <p>
                {{ $content->{'hero_subtitle_'.app()->getLocale()} }}
            </p>
        </div>
    </div>
</section>

<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($stats as $stat)
            <div class="col-md-4">
                <div class="stat-card">
                    <img src="{{ asset('storage/'.$stat->icon) }}" class="mb-3" width="40">
                    <h3>{{ $stat->value }}</h3>
                    <p>{{ $stat->{'label_'.app()->getLocale()} }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="client-section text-center">
    <h3 class="section-title">Our Client</h3>

    <div class="container">
        <div class="row justify-content-center align-items-center g-4 mt-4">
            @foreach ($clients as $client)
            <div class="col-6 col-md-3">
                <img src="{{ asset('storage/'.$client->logo) }}"
                    class="client-logo">
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="expertise-section">
    <h3 class="section-title text-center">Our Expertise</h3>
    <p class="text-center text-muted">Core Industrial Services</p>

    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($expertises as $exp)
            <div class="col-md-4">
                <div class="expertise-card">
                    <img src="{{ asset('storage/'.$exp->icon) }}" width="48">
                    <h4>{{ $exp->{'title_'.app()->getLocale()} }}</h4>
                    <p>{{ $exp->{'desc_'.app()->getLocale()} }}</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection