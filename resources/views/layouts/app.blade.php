<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sistem Informasi Statik Profil Mahasiswa - ITS Academic Profile. Tugas 1 PBKK B Teknik Informatika ITS Kelompok 7.">
    <meta name="author" content="Kelompok 7 - PBKK B Teknik Informatika ITS">
    
    <title>@yield('title', 'Beranda') — ITS Academic Profile</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Application CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles')
</head>
<body>

    <!-- Header Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" id="nav-brand">
                <span class="navbar-brand-badge">
                    <i class="bi bi-mortarboard-fill"></i>
                </span>
                <div class="d-flex flex-column">
                    <span class="brand-text">ITS Profile</span>
                    <span class="brand-subtext">Teknik Informatika</span>
                </div>
            </a>

            <!-- Mobile Hamburger Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation" id="btn-navbar-toggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" id="nav-link-home">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" id="nav-link-about">
                            <i class="bi bi-building me-1"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('project') ? 'active' : '' }}" href="{{ route('project') }}" id="nav-link-project">
                            <i class="bi bi-cpu me-1"></i> Project
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('calculator') || request()->routeIs('hitung') ? 'active' : '' }}" href="{{ route('calculator') }}" id="nav-link-calculator">
                            <i class="bi bi-calculator me-1"></i> Kalkulator
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <span class="badge bg-light text-primary border px-2 py-1 text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.05em;">
                            Kelompok 7 • PBKK B
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Body -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <span class="navbar-brand-badge me-2" style="width: 32px; height: 32px; font-size: 0.9rem;">
                            <i class="bi bi-mortarboard-fill"></i>
                        </span>
                        <span class="text-white fw-bold fs-6">ITS Academic Profile</span>
                    </div>
                    <p class="small text-muted mb-3">
                        Sistem Informasi Statik Profil Mahasiswa dibangun sebagai Tugas Mandiri 1 Pemrograman Berbasis Kerangka Kerja (PBKK) Kelas B, Departemen Teknik Informatika, Institut Teknologi Sepuluh Nopember.
                    </p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary-subtle text-light border border-secondary small">Laravel 12</span>
                        <span class="badge bg-secondary-subtle text-light border border-secondary small">Blade View</span>
                        <span class="badge bg-secondary-subtle text-light border border-secondary small">Bootstrap 5</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Navigasi Halaman</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1 text-info"></i> Beranda Mahasiswa</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1 text-info"></i> Profil Departemen ITS</a></li>
                        <li><a href="{{ route('project') }}"><i class="bi bi-chevron-right me-1 text-info"></i> Ide Proyek Agentic AI</a></li>
                        <li><a href="{{ route('calculator') }}"><i class="bi bi-chevron-right me-1 text-info"></i> Kalkulator Interaktif</a></li>
                        <li><a href="{{ url('/hitung/10/5/kali') }}"><i class="bi bi-chevron-right me-1 text-info"></i> Contoh Challenge: /hitung/10/5/kali</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h6 class="text-white fw-semibold mb-3">Kelompok 7 — PBKK B</h6>
                    <p class="small text-muted mb-2">
                        Departemen Teknik Informatika, Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC), Institut Teknologi Sepuluh Nopember, Surabaya.
                    </p>
                    <p class="small text-muted mb-0">
                        <i class="bi bi-geo-alt me-1 text-info"></i> Kampus ITS Sukolilo, Surabaya 60111
                    </p>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="row align-items-center small">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; {{ date('Y') }} Kelompok 7 PBKK B. Hak Cipta Dilindungi.
                </div>
                <div class="col-md-6 text-center text-md-end text-muted">
                    Sistem Informasi Profil Mahasiswa &bull; S1 Teknik Informatika ITS
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3.3 Bundle JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @stack('scripts')
</body>
</html>
