@extends('layouts.app')

@section('title', __('general.services'))

@section('content')

@include('components.page-header', ['header' => $header])

@include('components.certificate', ['certificates' => $certificates])

<section class="service-page section-space">
    <div class="container">

        <h2 class="section-title text-center">
            {{ __('general.services') }}
        </h2>

        <div class="row g-4 mt-5">
            @foreach ($services as $service)
            <div class="col-md-3 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('storage/'.$service->image) }}" alt="">
                    <div class="service-content">
                        <h4>{{ $service->{'title_'.app()->getLocale()} }}</h4>
                        <p>{{ $service->{'short_desc_'.app()->getLocale()} }}</p>
                        <a href="/{{ app()->getLocale() }}/services/{{ $service->slug }}">
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