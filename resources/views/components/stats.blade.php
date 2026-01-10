    <section class="stats-section">
        <div class="container">
            <div class="row g-4 mt-4">
                @foreach ($stats as $stat)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="stat-card">
                        <div class="stat-content">
                            <img src="{{ asset('storage/' . $stat->icon) }}" class="stat-icon">
                            <h3>{{ $stat->value }}</h3>
                            <p>{{ $stat->{'label_' . app()->getLocale()} }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>