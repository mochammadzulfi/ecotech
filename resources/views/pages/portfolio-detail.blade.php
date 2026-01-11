@extends('layouts.app')

@section('content')

@include('components.page-header', ['header' => $header])

<section class="project-detail-highlight py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-4">
                <img src="{{ asset('storage/'.$project->image) }}"
                    class="img-fluid rounded-4 shadow-sm">
            </div>

            <div class="col-md-8">

                <div class="project-title-row">
                    <h1 class="project-title">
                        {{ $project->title }}
                    </h1>

                    <span class="project-category-badge">
                        {{ $project->category?->name ?? '-' }}
                    </span>
                </div>


                @if ($project->location)
                <div class="project-location mb-3">
                    <img src="{{ asset('assets/images/client.png') }}" class="icon-inline">
                    {{ $project->location }}
                </div>
                @endif

                <p class="text-muted">
                    {{ $project->excerpt }}
                </p>
            </div>

        </div>
    </div>
</section>

<section class="project-section py-5 bg-light">
    <div class="container">

        <div id="project-wrapper">
            @include('pages.partials.project-related-grid', ['projects' => $relatedProjects])
        </div>

    </div>
</section>


@include('components.cta', ['cta' => $cta])

@endsection