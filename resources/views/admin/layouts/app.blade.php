<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Optional polish (VERY LIGHT) --}}
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            box-shadow: 8px 0 24px rgba(0, 0, 0, 0.04);
            z-index: 1030;
            width: 260px;
            min-width: 260px;
            max-width: 260px;
            flex-shrink: 0;
        }

        .sidebar .text-uppercase {
            font-size: 11px;
            letter-spacing: .08em;
            color: #9aa0ac;
            margin-top: 18px;
            margin-bottom: 6px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 15px;
            color: #4a4a4a;
            transition: all .25s ease;
        }

        .sidebar .nav-link.active {
            background: #eef2ff;
            color: #1e3794;
            font-weight: 600;
            position: relative;
        }

        .sidebar .nav-link.active::before {
            content: '';
            position: absolute;
            left: -12px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: #1e3794;
            border-radius: 4px;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            color: #7a7a7a;
            transition: color .25s ease;
        }

        .sidebar .nav-link.active i {
            color: #1e3794;
        }


        /* MOBILE TWEAK */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
            }

            .content-wrapper {
                width: 100%;
            }

            .topbar {
                padding-left: 12px;
                padding-right: 12px;
            }

            .content-wrapper .p-4 {
                padding: 16px !important;
            }

            h5 {
                font-size: 16px;
            }

            .nav-link {
                font-size: 15px;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
        }

        .nav-link {
            font-weight: 500;
        }

        /* MOBILE SIDEBAR */
        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1050;
                transform: translateX(-100%);
                transition: transform .3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.45);
                z-index: 1040;
                display: none;
            }

            .sidebar-backdrop.show {
                display: block;
            }

            /* PENTING: pastikan sidebar bisa diklik */
            .sidebar,
            .sidebar * {
                pointer-events: auto;
            }
        }

        .sidebar {
            z-index: 1050;
            pointer-events: auto;
        }

        .sidebar * {
            pointer-events: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar-backdrop d-lg-none"></div>

    {{-- SIDEBAR --}}
    <div class="d-flex">

        {{-- SIDEBAR (OFFCANVAS DI MOBILE) --}}
        <aside class="sidebar border-end offcanvas-md offcanvas-start"
            tabindex="-1"
            id="adminSidebar">

            <div class="offcanvas-header d-md-none border-bottom">
                <h5 class="mb-0">EcoTech CMS</h5>
                <button type="button"
                    class="btn-close"
                    id="closeSidebar"></button>
            </div>


            <ul class="nav flex-column gap-1 p-3">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>

                {{-- HOME --}}
                <li class="nav-item mt-2 text-uppercase small text-muted px-2">
                    Home Page
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.home.edit') }}"
                        class="nav-link {{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
                        <i class="bi bi-house me-2"></i> Hero Content
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.stats.index') }}"
                        class="nav-link {{ request()->routeIs('admin.stats.*') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart me-2"></i> Home Stats
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.expertise.index') }}"
                        class="nav-link {{ request()->routeIs('admin.expertise.*') ? 'active' : '' }}">
                        <i class="bi bi-lightning-charge me-2"></i> Home Expertise
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.clients.index') }}"
                        class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i> Client Logo
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.precision.edit') }}"
                        class="nav-link {{ request()->routeIs('admin.precision.*') ? 'active' : '' }}">
                        <i class="bi bi-award me-2"></i> Precision Section
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.cta.edit') }}"
                        class="nav-link {{ request()->routeIs('admin.cta.*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone me-2"></i> CTA Section
                    </a>
                </li>

                {{-- CONTENT --}}
                <li class="nav-item mt-3 text-uppercase small text-muted px-2">
                    Content
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}"
                        class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase me-2"></i> Services
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}"
                        class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam me-2"></i>
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}"
                        class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="bi bi-kanban me-2"></i>
                        Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.project-categories.index') }}"
                        class="nav-link {{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags me-2"></i>
                        Project Categories
                    </a>
                </li>

                <li class="nav-item mt-3 text-uppercase small text-muted px-2">
                    Global
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.certificates.index') }}"
                        class="nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                        <i class="bi bi-patch-check me-2"></i>
                        Certificates
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.footer.edit') }}"
                        class="nav-link {{ request()->routeIs('admin.footer.*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window me-2"></i> Footer
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.contact.edit') }}"
                        class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                        <i class="bi bi-telephone me-2"></i> Contact
                    </a>
                </li>


            </ul>

        </aside>

        {{-- MAIN --}}
        <div class="flex-fill content-wrapper">

            {{-- TOPBAR --}}
            <nav class="navbar bg-white border-bottom topbar px-4 d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center gap-2">
                    {{-- TOGGLE SIDEBAR (MOBILE) --}}
                    <button class="btn btn-outline-secondary d-lg-none me-2" id="toggleSidebar">
                        <i class="bi bi-list"></i>
                    </button>

                    <span class="fw-semibold">Admin Dashboard</span>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted small">
                        @auth
                        {{ auth()->user()->email }}
                        @endauth
                    </span>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>

            {{-- PAGE CONTENT --}}
            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const backdrop = document.querySelector('.sidebar-backdrop');
        const toggleBtn = document.getElementById('toggleSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.add('show');
            backdrop.classList.add('show');
        });

        closeBtn?.addEventListener('click', () => {
            sidebar.classList.remove('show');
            backdrop.classList.remove('show');
        });

        backdrop?.addEventListener('click', () => {
            sidebar.classList.remove('show');
            backdrop.classList.remove('show');
        });
    </script>


</body>

</html>