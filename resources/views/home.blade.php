@extends('layouts.app')

@section('title', 'Beranda Profil Mahasiswa')

@section('content')
<div class="container py-3">
    
    <!-- Hero / Student Profile Header -->
    <div class="card card-modern p-4 p-md-5 mb-4 position-relative border-0 shadow-sm" style="background: linear-gradient(135deg, #FFFFFF 0%, #F1F6F9 100%); border-left: 5px solid var(--primary) !important;">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge-academic">
                        <i class="bi bi-mortarboard-fill"></i> ITS Academic Profile
                    </span>
                    <span class="badge-accent">
                        <i class="bi bi-check-circle-fill"></i> {{ $student['status'] }}
                    </span>
                </div>

                <h1 class="display-6 fw-bold mb-2 text-dark">
                    Selamat Datang <span class="wave-hand">👋</span>
                </h1>
                
                <h2 class="h3 fw-bold text-primary mb-1" id="student-name">
                    {{ $student['name'] }}
                </h2>
                
                <div class="d-flex flex-wrap align-items-center gap-3 text-secondary mb-3 font-monospace">
                    <span><i class="bi bi-person-badge text-primary me-1"></i> NRP: <strong class="text-dark" id="student-nrp">{{ $student['nrp'] }}</strong></span>
                    <span>&bull;</span>
                    <span><i class="bi bi-geo-alt text-primary me-1"></i> {{ $student['major'] }}</span>
                    <span>&bull;</span>
                    <span><i class="bi bi-people text-primary me-1"></i> {{ $student['group'] }}</span>
                </div>

                <p class="text-secondary lead fs-6 mb-4" style="max-width: 720px;">
                    {{ $student['bio'] }}
                </p>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('project') }}" class="btn btn-primary-its" id="btn-hero-project">
                        <i class="bi bi-cpu me-1"></i> Lihat Project Idea
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-its" id="btn-hero-about">
                        <i class="bi bi-building me-1"></i> Profil Departemen
                    </a>
                    <a href="{{ route('calculator') }}" class="btn btn-outline-secondary" id="btn-hero-calc">
                        <i class="bi bi-calculator me-1"></i> Kalkulator Server
                    </a>
                </div>
            </div>

            <!-- Student Profile Badge / Avatar Card -->
            <div class="col-lg-4 text-center">
                <div class="p-4 bg-white rounded-4 border shadow-sm mx-auto" style="max-width: 320px;">
                    <div class="avatar-circle mx-auto mb-3">
                        AR
                    </div>
                    <h5 class="fw-bold mb-1">{{ $student['name'] }}</h5>
                    <p class="small text-muted mb-2 font-monospace">{{ $student['nrp'] }}</p>
                    <div class="small badge bg-primary-subtle text-primary fw-semibold px-3 py-1 mb-3">
                        Informatika ITS &bull; 2024
                    </div>
                    
                    <div class="d-flex justify-content-center gap-2 pt-2 border-top">
                        <a href="https://github.com/Renggosakti" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                            <i class="bi bi-github me-1"></i> GitHub
                        </a>
                        <a href="mailto:aryarangga732@gmail.com" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                            <i class="bi bi-envelope me-1"></i> Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Academic Stats Row -->
    <div class="row g-3 mb-4">
        @foreach($student['stats'] as $stat)
        <div class="col-6 col-lg-3">
            <div class="stat-box">
                <div class="stat-icon"><i class="bi {{ $stat['icon'] }}"></i></div>
                <div class="stat-val">{{ $stat['value'] }}</div>
                <div class="stat-lbl">{{ $stat['label'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Main Content Grid -->
    <div class="row g-4">
        
        <!-- Left Column: Competencies & Kelompok 7 Member List -->
        <div class="col-lg-7">
            
            <!-- Kelompok 7 PBKK B Card -->
            <div class="card card-modern p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div>
                        <h4 class="h5 fw-bold mb-1 text-primary">
                            <i class="bi bi-people-fill me-2"></i>Anggota Kelompok 7
                        </h4>
                        <span class="text-muted small">Mata Kuliah Pemrograman Berbasis Kerangka Kerja (PBKK) — Kelas B</span>
                    </div>
                    <span class="badge bg-primary text-white rounded-pill px-3 py-1">6 Mahasiswa</span>
                </div>

                <div class="team-list">
                    @foreach($group_members as $member)
                    <div class="d-flex align-items-center justify-content-between team-item rounded-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-sm" style="background-color: {{ $member['avatar_color'] }}; font-size: 0.95rem;">
                                {{ substr($member['name'], 0, 1) }}
                            </div>
                            <div>
                                <div class="fw-bold text-dark">{{ $member['name'] }}</div>
                                <div class="small text-muted font-monospace"><i class="bi bi-person-badge me-1"></i>{{ $member['nrp'] }}</div>
                            </div>
                        </div>
                        <span class="badge bg-light text-secondary border small">
                            {{ $member['role'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Skills & Tech Focus -->
            <div class="card card-modern p-4">
                <h4 class="h5 fw-bold mb-3 text-primary">
                    <i class="bi bi-code-slash me-2"></i>Kompetensi & Fokus Keilmuan
                </h4>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($student['skills'] as $skill)
                    <span class="badge bg-light text-dark border px-3 py-2 fs-7 fw-semibold">
                        <i class="bi bi-check2 text-primary me-1"></i>{{ $skill }}
                    </span>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Right Column: Quick Navigation & Showcase Cards -->
        <div class="col-lg-5">
            
            <!-- Quick Link 1: Project Idea -->
            <div class="card card-modern card-interactive p-4 mb-3" style="border-left: 4px solid #0F4C75 !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="stat-icon p-3 bg-primary-subtle text-primary rounded-3">
                        <i class="bi bi-cpu-fill fs-4"></i>
                    </div>
                    <div>
                        <span class="badge bg-info-subtle text-info fw-bold mb-1" style="font-size: 0.72rem;">AGENTIC AI</span>
                        <h5 class="fw-bold mb-1 text-dark">Rancangan Ide Proyek</h5>
                        <p class="small text-secondary mb-2">
                            Synthetix ITS: Platform multi-agen cerdas untuk pendampingan studi dan tugas akhir mahasiswa Teknik Informatika.
                        </p>
                        <a href="{{ route('project') }}" class="small fw-bold text-primary">
                            Pelajari Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Link 2: Department Profile -->
            <div class="card card-modern card-interactive p-4 mb-3" style="border-left: 4px solid #3282B8 !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="stat-icon p-3 bg-info-subtle text-primary rounded-3">
                        <i class="bi bi-building fs-4"></i>
                    </div>
                    <div>
                        <span class="badge bg-primary-subtle text-primary fw-bold mb-1" style="font-size: 0.72rem;">DEPARTEMEN ITS</span>
                        <h5 class="fw-bold mb-1 text-dark">Teknik Informatika ITS</h5>
                        <p class="small text-secondary mb-2">
                            Pelopor pendidikan ilmu komputer bereputasi unggul, terakreditasi IABEE & BAN-PT dengan 6 laboratorium riset.
                        </p>
                        <a href="{{ route('about') }}" class="small fw-bold text-primary">
                            Buka Profil Jurusan <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Link 3: Server-side Calculator -->
            <div class="card card-modern card-interactive p-4" style="border-left: 4px solid #0DCAF0 !important;">
                <div class="d-flex align-items-start gap-3">
                    <div class="stat-icon p-3 bg-light text-info rounded-3">
                        <i class="bi bi-calculator-fill fs-4"></i>
                    </div>
                    <div>
                        <span class="badge bg-secondary-subtle text-dark fw-bold mb-1" style="font-size: 0.72rem;">ROUTE CHALLENGE</span>
                        <h5 class="fw-bold mb-1 text-dark">Kalkulator Dinamis</h5>
                        <p class="small text-secondary mb-2">
                            Kalkulasi server-side melalui parameter URL dengan dukungan operasi tambah, kurang, kali, dan bagi.
                        </p>
                        <a href="{{ route('calculator') }}" class="small fw-bold text-primary">
                            Coba Kalkulator <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
