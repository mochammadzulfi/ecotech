<footer class="site-footer">
    <div class="container">
        <div class="row gy-4">

            {{-- BRAND --}}
            <div class="col-md-3">
                <h5>Boiler Tech</h5>
                <p>
                    {{ $footer->{'about_'.app()->getLocale()} }}
                </p>
            </div>

            {{-- COMPANY --}}
            <div class="col-md-2">
                <h5>Company</h5>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Certifications</a></li>
                    <li><a href="/{{ app()->getLocale() }}/portfolio">Portfolio</a></li>
                </ul>
            </div>

            {{-- SERVICES --}}
            <div class="col-md-2">
                <h5>{{ __('general.footer_services') }}</h5>
                <ul>
                    @foreach ($services as $service)
                    <li>
                        <a href="/{{ app()->getLocale() }}/services/{{ $service->slug }}">
                            {{ $service->{'title_' . app()->getLocale()} }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>


            {{-- PRODUCT --}}
            <div class="col-md-2">
                <h5>{{ __('general.footer_products') }}</h5>
                <ul>
                    @foreach ($products as $product)
                    <li>
                        <a href="/{{ app()->getLocale() }}/products/{{ $product->slug }}">
                            {{ $product->{'name_' . app()->getLocale()} }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>


            {{-- CONTACT --}}
            <div class="col-md-3">
                <h5>{{ $footer->company_name }}</h5>

                <p>
                    📧 {{ $footer->email }}<br>
                    📞 {{ $footer->phone }}
                </p>

                <p>
                    {{ $footer->{'address_'.app()->getLocale()} }}
                </p>
            </div>

        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="footer-bottom">
        © {{ date('Y') }} {{ $footer->company_name }}. {{ __('general.copyright') }}.
    </div>
</footer>