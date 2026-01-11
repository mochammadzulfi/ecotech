<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">


    @stack('styles')
</head>

<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.main-navbar');

            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();

                const url = e.target.closest('a').getAttribute('href');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('product-wrapper').innerHTML = html;
                        AOS.refresh(); // re-init animation
                        window.history.pushState({}, '', url);
                    });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const wrapper = document.getElementById('product-wrapper');
            const searchInput = document.getElementById('product-search');

            function loadProducts(url) {
                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        wrapper.innerHTML = html;
                        AOS.refresh();
                        window.history.pushState({}, '', url);
                    });
            }

            /* =====================
               CATEGORY CLICK
            ===================== */
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.btn-filter');
                if (!btn) return;

                e.preventDefault();

                const category = btn.dataset.category || '';
                const search = searchInput.value;

                let url = `?category=${category}&search=${search}`;
                loadProducts(url);

                // active state
                document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });

            /* =====================
               SEARCH INPUT
            ===================== */
            let searchTimer;
            searchInput.addEventListener('keyup', function() {
                clearTimeout(searchTimer);

                searchTimer = setTimeout(() => {
                    const categoryBtn = document.querySelector('.btn-filter.active');
                    const category = categoryBtn ? categoryBtn.dataset.category : '';

                    let url = `?category=${category}&search=${searchInput.value}`;
                    loadProducts(url);
                }, 400); // debounce
            });

            /* =====================
               PAGINATION CLICK
            ===================== */
            document.addEventListener('click', function(e) {
                const pageLink = e.target.closest('.pagination a');
                if (!pageLink) return;

                e.preventDefault();
                loadProducts(pageLink.getAttribute('href'));
            });

        });
    </script>


</body>

</html>