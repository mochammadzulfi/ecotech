@extends('layouts.app')

@section('content')

@include('components.page-header', ['header' => $header])
@include('components.certificate', ['certificates' => $certificates])

<section class="project-section py-5">
    <div class="container">

        {{-- FILTER --}}
        <div class="mb-4">
            <button class="btn-filter active" data-category="">
                {{ __('general.all') }}
            </button>

            @foreach ($categories as $cat)
            <button class="btn-filter" data-category="{{ $cat->slug }}">
                {{ $cat->name }}
            </button>
            @endforeach
        </div>

        {{-- AJAX WRAPPER --}}
        <div id="project-wrapper">
            @include('pages.partials.project-grid', ['projects' => $projects])
        </div>

    </div>
</section>

@include('components.cta', ['cta' => $cta])

@endsection