<div class="project-card">
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->{'title_' . app()->getLocale()} }}">

    <div class="project-overlay">
        <h4>{{ $project->{'title_' . app()->getLocale()} }}</h4>
        <p>{{ $project->{'category_' . app()->getLocale()} }}</p>
        <span>
            📍 {{ $project->{'location_' . app()->getLocale()} }}
        </span>
    </div>
</div>