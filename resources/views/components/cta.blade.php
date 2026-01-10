<section class="cta-section-component">
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