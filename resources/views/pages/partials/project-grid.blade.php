<div class="row g-4">
    @foreach ($projects as $project)
    <div class="col-md-4 col-sm-6">
        <div class="project-card" data-aos="fade-up">

            {{-- IMAGE --}}
            <div class="project-image">
                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">

                @if ($project->category)
                <span class="project-badge">
                    {{ $project->category->name }}
                </span>
                @endif
            </div>

            {{-- CONTENT --}}
            <div class="project-content">
                <h5>{{ $project->title }}</h5>

                @if ($project->location)
                <div class="project-location">
                    <img src="{{ asset('assets/images/client.png') }}" alt="Location" class="icon-inline">
                    {{ $project->location }}
                </div>
                @endif

                <p class="project-excerpt">
                    {{ $project->short_desc }}
                </p>

                <a href="/{{ app()->getLocale() }}/portfolio/{{ $project->slug }}"
                    class="detail-link mt-5">
                    {{ __('general.view_detail') }} →
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-5 d-flex justify-content-center">
    {{ $projects->links() }}
</div>