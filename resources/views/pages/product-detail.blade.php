@extends('layouts.app')

@section('content')

@include('components.page-header', ['header' => $header])

<section class="product-detail-section">
    <div class="container">
        <div class="row align-items-start g-5">

            {{-- IMAGE --}}
            <div class="col-md-5">
                <div class="product-detail-image">
                    <img src="{{ asset('storage/'.$product->image) }}"
                        alt="{{ $product->{'name_'.app()->getLocale()} }}">
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-md-7">
                <h2 class="product-detail-title">
                    {{ $product->{'name_'.app()->getLocale()} }}
                </h2>

                <p class="product-detail-desc">
                    {{ $product->{'short_desc_'.app()->getLocale()} }}
                </p>

                {{-- SPECS --}}
                @if (!empty($product->specs))
                <div class="product-detail-specs">
                    @foreach ($product->specs as $spec)
                    <div class="spec-row">
                        <span class="spec-label">
                            {{ $spec['label_'.app()->getLocale()] }}
                        </span>
                        <span class="spec-value">
                            {{ $spec['value'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

{{-- RELATED PRODUCTS --}}
<section class="product-section">
    <div class="container">

        <h4 class="section-title text-center mb-4">
            {{ __('general.related_products') }}
        </h4>

        <div id="related-wrapper">
            @include('pages.partials.related-products', [
            'relatedProducts' => $relatedProducts
            ])
        </div>

    </div>
</section>



@include('components.cta', ['cta' => $cta])

@endsection