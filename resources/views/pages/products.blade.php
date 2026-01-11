@extends('layouts.app')

@section('title', __('general.products'))

@section('content')

@include('components.page-header', ['header' => $header])

@include('components.certificate', ['certificates' => $certificates])

<section class="product-section section-space">
    <div class="container">

        {{-- FILTER + SEARCH --}}
        <form id="product-filter-form" class="product-filter mb-4">
            <div class="d-flex flex-wrap gap-2 align-items-center">

                {{-- ALL --}}
                <a href="{{ route('products', app()->getLocale()) }}"
                    class="btn btn-filter {{ request('category') ? '' : 'active' }}"
                    data-category="">
                    {{ __('general.all') }}
                </a>

                {{-- CATEGORY --}}
                @foreach ($categories as $cat)
                <a href="?category={{ $cat->slug }}"
                    class="btn btn-filter {{ request('category') == $cat->slug ? 'active' : '' }}"
                    data-category="{{ $cat->slug }}">
                    {{ $cat->{'name_'.app()->getLocale()} }}
                </a>
                @endforeach

                {{-- SEARCH --}}
                <div class="search-box ms-auto">
                    <i class="bi bi-search"></i>
                    <input type="text"
                        id="product-search"
                        name="search"
                        class="form-control ms-auto"
                        placeholder="{{ __('general.search_model') }}"
                        value="{{ request('search') }}"
                        style="max-width: 240px;">
                </div>
            </div>
        </form>

        {{-- PRODUCT GRID --}}
        <div id="product-wrapper">
            @include('pages.partials.product-grid')
        </div>

    </div>
</section>

@include('components.cta', ['cta' => $cta])

@endsection