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
            if (!navbar) return;

            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const wrapper = document.getElementById('product-wrapper');
            const searchInput = document.getElementById('product-search');

            if (!wrapper) return; // ⛔ hanya halaman product list

            function loadProducts(url) {
                wrapper.classList.add('ajax-fade-out');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        setTimeout(() => {
                            wrapper.innerHTML = html;
                            wrapper.classList.remove('ajax-fade-out');
                            wrapper.classList.add('ajax-fade-in');

                            AOS.refresh();
                            window.history.pushState({}, '', url);

                            setTimeout(() => {
                                wrapper.classList.remove('ajax-fade-in');
                            }, 400);
                        }, 200);
                    });
            }

            // CATEGORY
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.btn-filter');
                if (!btn) return;

                e.preventDefault();

                const category = btn.dataset.category || '';
                const search = searchInput.value;
                loadProducts(`?category=${category}&search=${search}`);

                document.querySelectorAll('.btn-filter')
                    .forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });

            // SEARCH
            let timer;
            searchInput.addEventListener('keyup', function() {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    const active = document.querySelector('.btn-filter.active');
                    const category = active ? active.dataset.category : '';
                    loadProducts(`?category=${category}&search=${searchInput.value}`);
                }, 400);
            });

            // PAGINATION
            document.addEventListener('click', function(e) {
                const pageLink = e.target.closest('#product-wrapper .pagination a');
                if (!pageLink) return;

                e.preventDefault();
                loadProducts(pageLink.getAttribute('href'));
            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const relatedWrapper = document.getElementById('related-wrapper');
            if (!relatedWrapper) return; // ⛔ hanya detail page

            document.addEventListener('click', function(e) {
                const pageLink = e.target.closest('#related-wrapper .pagination a');
                if (!pageLink) return;

                e.preventDefault();
                const url = pageLink.getAttribute('href');

                relatedWrapper.classList.add('ajax-fade-out');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        setTimeout(() => {
                            relatedWrapper.innerHTML = html;

                            relatedWrapper.classList.remove('ajax-fade-out');
                            relatedWrapper.classList.add('ajax-fade-in');

                            AOS.refresh();
                            window.history.replaceState({}, '', url);

                            setTimeout(() => {
                                relatedWrapper.classList.remove('ajax-fade-in');
                            }, 400);
                        }, 200);
                    });
            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const wrapper = document.getElementById('project-wrapper');
            if (!wrapper) return; // ⛔ hanya halaman project

            function loadProjects(url) {
                wrapper.classList.add('ajax-fade-out');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        setTimeout(() => {
                            wrapper.innerHTML = html;

                            wrapper.classList.remove('ajax-fade-out');
                            wrapper.classList.add('ajax-fade-in');

                            AOS.refresh();
                            window.history.pushState({}, '', url);

                            setTimeout(() => {
                                wrapper.classList.remove('ajax-fade-in');
                            }, 400);
                        }, 200);
                    });
            }

            /* FILTER */
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.btn-filter');
                if (!btn) return;

                e.preventDefault();

                document.querySelectorAll('.btn-filter')
                    .forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                loadProjects(`?category=${btn.dataset.category}`);
            });

            /* PAGINATION */
            document.addEventListener('click', function(e) {
                const link = e.target.closest('#project-wrapper .pagination a');
                if (!link) return;

                e.preventDefault();
                loadProjects(link.getAttribute('href'));
            });

        });
    </script>

    <script>
        document.addEventListener('click', function(e) {
            const link = e.target.closest('#project-wrapper .pagination a');
            if (!link) return;

            e.preventDefault();

            fetch(link.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('project-wrapper').innerHTML = html;
                    AOS.refresh();
                    window.history.pushState({}, '', link.href);
                });
        });
    </script>

</body>

</html>