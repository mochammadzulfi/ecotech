@php
$lang = app()->getLocale();
$segments = request()->segments();

$switchLang = $lang === 'id' ? 'en' : 'id';
$segments[0] = $switchLang;
$switchUrl = '/' . implode('/', $segments);

$page = request()->segment(2);
@endphp

<nav class="navbar navbar-expand-lg">
    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand" href="/{{ $lang }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </a>

        {{-- TOGGLER (INI YANG HILANG SEBELUMNYA) --}}
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ $page === null ? 'active' : '' }}"
                        href="/{{ $lang }}">
                        {{ __('general.home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $page === 'services' ? 'active' : '' }}"
                        href="/{{ $lang }}/services">
                        {{ __('general.services') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $page === 'products' ? 'active' : '' }}"
                        href="/{{ $lang }}/products">
                        {{ __('general.products') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $page === 'portfolio' ? 'active' : '' }}"
                        href="/{{ $lang }}/portfolio">
                        {{ __('general.portfolio') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $page === 'contact' ? 'active' : '' }}"
                        href="/{{ $lang }}/contact">
                        {{ __('general.contact') }}
                    </a>
                </li>

                {{-- LANGUAGE (MOBILE ONLY) --}}
                <li class="nav-item d-lg-none mt-3">
                    <a class="nav-link {{ $lang === 'id' ? 'active' : '' }}"
                        href="{{ $lang === 'id' ? '#' : $switchUrl }}">
                        ID
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link {{ $lang === 'en' ? 'active' : '' }}"
                        href="{{ $lang === 'en' ? '#' : $switchUrl }}">
                        EN
                    </a>
                </li>

            </ul>
        </div>

        {{-- LANGUAGE DESKTOP --}}
        <div class="lang-switch d-none d-lg-flex">
            <a href="{{ $lang === 'id' ? '#' : $switchUrl }}"
                class="{{ $lang === 'id' ? 'active' : '' }}">
                ID
            </a>
            &nbsp;<b class="text-white">|</b>&nbsp;
            <a href="{{ $lang === 'en' ? '#' : $switchUrl }}"
                class="{{ $lang === 'en' ? 'active' : '' }}">
                EN
            </a>
        </div>

    </div>
</nav>