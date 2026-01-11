<div class="row g-4">
    @foreach ($products as $product)
    <div class="col-md-4 col-sm-6" data-aos="fade-up">
        <div class="product-card">
            <img src="{{ asset('storage/'.$product->image) }}">

            <div class="product-content">
                <h5>{{ $product->{'name_'.app()->getLocale()} }}</h5>

                <p class="product-desc">
                    {{ $product->{'short_desc_'.app()->getLocale()} }}
                </p>

                @if (!empty($product->specs))
                <div class="product-spec">
                    @foreach ($product->specs as $spec)
                    <span class="spec-badge">
                        {{ $spec['label_'.app()->getLocale()] }}:
                        {{ $spec['value'] }}
                    </span>
                    @endforeach
                </div>
                @endif

                <a href="/{{ app()->getLocale() }}/products/{{ $product->slug }}"
                    class="detail-link">
                    {{ __('general.view_detail') }} →
                </a>
            </div>

        </div>
    </div>
    @endforeach
</div>

<div class="mt-5 d-flex justify-content-center">
    {{ $products->links() }}
</div>