<section class="page-header"
    style="background-image: url('{{ asset('storage/'.$header->background_image) }}')">

    <div class="page-header-overlay">
        <div class="container">
            <h1>
                {{ $header->{'title_'.app()->getLocale()} }}
            </h1>

            @if ($header->{'subtitle_'.app()->getLocale()} )
            <p>
                {{ $header->{'subtitle_'.app()->getLocale()} }}
            </p>
            @endif

            {{-- BUTTON --}}
            @if ($header->btn_primary_text_id || $header->btn_secondary_text_id)
            <div class="page-header-actions mt-4">

                @if ($header->btn_primary_text_id)
                <a href="/{{ app()->getLocale() }}{{ $header->btn_primary_url }}"
                    class="btn btn-primary me-2">
                    {{ $header->{'btn_primary_text_'.app()->getLocale()} }}
                </a>
                @endif

                @if ($header->btn_secondary_text_id)
                <a href="/{{ app()->getLocale() }}{{ $header->btn_secondary_url }}"
                    class="btn btn-outline-light">
                    {{ $header->{'btn_secondary_text_'.app()->getLocale()} }}
                </a>
                @endif

            </div>
            @endif
        </div>
    </div>
</section>