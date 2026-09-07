<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — ITS Academic Profile</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Fraunces:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="app-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="dot"></span> ITS Academic Profile
            </a>
            <button class="menu-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end offcanvas-dark" tabindex="-1" id="mainMenu" aria-labelledby="mainMenuLabel">
        <div class="offcanvas-header">
            <span class="navbar-brand mb-0" id="mainMenuLabel"><span class="dot"></span> Menu</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column">
            <a class="nav-link-big {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link-big {{ request()->routeIs('anggota.show') ? 'active' : '' }}" href="{{ route('home') }}#anggota">Anggota</a>
            <a class="nav-link-big {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            <a class="nav-link-big {{ request()->routeIs('project') ? 'active' : '' }}" href="{{ route('project') }}">Project</a>
            <a class="nav-link-big {{ request()->routeIs('kalkulator') || request()->routeIs('hitung') ? 'active' : '' }}" href="{{ route('kalkulator') }}">Kalkulator</a>
            <div class="mt-auto pt-4 text-faint small">
                &copy; {{ date('Y') }} Kelompok 7 — PBKK B
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="app-footer">
        <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 text-center text-sm-start">
            <p class="mb-0">&copy; {{ date('Y') }} Kelompok 7 — PBKK B, Teknik Informatika ITS</p>
            <p class="mb-0">Dibangun dengan Laravel &amp; Bootstrap 5</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
