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

    <div id="top-progress"></div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <a href="https://wa.me/{{ $contact->phone }}?text={{ urlencode(__('general.wa_message')) }}"
        class="wa-float"
        target="_blank">
        <img src="{{ asset('assets/images/whatsapp.svg') }}">
    </a>

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

            if (!wrapper) return;

            function loadProducts(url) {
                if (!wrapper) return;

                // 1. start premium progress
                startProgress();

                // 2. fade out existing content
                wrapper.classList.add('ajax-fade-out');

                // 3. skeleton (ringan, tidak over)
                setTimeout(() => {
                    wrapper.innerHTML = `
            <div class="row g-4">
                ${Array(6).fill(`
                    <div class="col-md-4 col-sm-6">
                        <div class="skeleton-card"></div>
                    </div>
                `).join('')}
            </div>
        `;
                }, 200);

                // 4. fetch ajax
                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {

                        setTimeout(() => {
                            wrapper.innerHTML = html;

                            // 5. fade in new content
                            wrapper.classList.remove('ajax-fade-out');
                            wrapper.classList.add('ajax-fade-in');

                            AOS.refresh();
                            window.history.pushState({}, '', url);

                            // 6. finish progress
                            finishProgress();

                            // cleanup
                            setTimeout(() => {
                                wrapper.classList.remove('ajax-fade-in');
                            }, 400);

                        }, 250);
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

    <script>
        let progressInterval;

        function startProgress() {
            const bar = document.getElementById('top-progress');
            let width = 10;

            bar.style.width = width + '%';

            progressInterval = setInterval(() => {
                if (width < 90) {
                    width += Math.random() * 8;
                    bar.style.width = width + '%';
                }
            }, 180);
        }

        function finishProgress() {
            const bar = document.getElementById('top-progress');
            clearInterval(progressInterval);

            bar.style.width = '100%';

            setTimeout(() => {
                bar.style.width = '0%';
            }, 400);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('a').forEach(link => {
                if (
                    link.href &&
                    !link.href.includes('#') &&
                    !link.hasAttribute('target')
                ) {
                    link.addEventListener('click', () => {
                        startProgress();
                    });
                }
            });

            window.addEventListener('pageshow', () => {
                finishProgress();
            });
        });
    </script>


</body>

</html>