@extends('layouts.app')

@section('title', __('general.detail_   services'))

@section('content')

@include('components.page-header', ['header' => $header])

<section class="service-intro section-space">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- IMAGE --}}
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$service->image) }}"
                    class="img-fluid rounded service-main-image"
                    alt="{{ $service->{'title_'.app()->getLocale()} }}">
            </div>

            {{-- CONTENT --}}
            <div class="col-md-8">
                <h2 class="mb-3">
                    {{ $service->{'title_'.app()->getLocale()} }}
                </h2>

                <p class="text-muted mb-4">
                    {{ $service->{'short_desc_'.app()->getLocale()} }}
                </p>

                <div class="service-description">
                    {!! nl2br(e($service->{'content_'.app()->getLocale()})) !!}
                </div>
            </div>

        </div>
    </div>
</section>

<section class="service-related section-space bg-light">
    <div class="container">

        <h3 class="section-title text-center mb-4">
            {{ __('general.services') }}
        </h3>

        <div class="row g-4">
            @foreach ($otherServices as $item)
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="">
                    <div class="service-content">
                        <h4>{{ $item->{'title_'.app()->getLocale()} }}</h4>
                        <p>{{ $item->{'short_desc_'.app()->getLocale()} }}</p>
                        <a href="{{ route('service.detail', [
                                'lang' => app()->getLocale(),
                                'slug' => $item->slug
                            ]) }}">
                            {{ __('general.learn_more') }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@include('components.stats', ['stats' => $stats])

@include('components.cta', ['cta' => $cta])

@endsection