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
                    <li><a href="/{{ app()->getLocale() }}/about">About Us</a></li>
                    <li><a href="/{{ app()->getLocale() }}/certification">Certifications</a></li>
                    <li><a href="/{{ app()->getLocale() }}/portfolio">Portfolio</a></li>
                </ul>
            </div>

            {{-- SERVICES --}}
            <div class="col-md-2">
                <h5>Services</h5>
                <ul>
                    <li>Survey & Analysis</li>
                    <li>Retubing</li>
                    <li>Insulation</li>
                    <li>Cleaning</li>
                </ul>
            </div>

            {{-- PRODUCT --}}
            <div class="col-md-2">
                <h5>Product</h5>
                <ul>
                    <li>Pipa Boiler</li>
                    <li>Valve</li>
                    <li>Instrumen Boiler</li>
                    <li>Chemical Boiler</li>
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