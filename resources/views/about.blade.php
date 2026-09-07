@extends('layouts.app')

@section('title', 'Tentang Departemen Teknik Informatika ITS')

@section('content')
<div class="container py-3">

    <!-- Page Header & Hero -->
    <div class="card card-modern p-4 p-md-5 mb-4 position-relative border-0 shadow-sm" style="background: linear-gradient(135deg, #0F4C75 0%, #0A3654 100%); color: #ffffff;">
        <div class="row align-items-center g-4">
            <div class="col-lg-9">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge bg-white text-primary fw-bold px-3 py-1 rounded-pill" style="font-size: 0.78rem;">
                        <i class="bi bi-building-fill me-1"></i> FTEIC ITS SURABAYA
                    </span>
                    <span class="badge bg-info text-dark fw-bold px-3 py-1 rounded-pill" style="font-size: 0.78rem;">
                        <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi IABEE & Unggul
                    </span>
                </div>

                <h1 class="display-6 fw-bold mb-2 text-white">
                    {{ $department['name'] }}
                </h1>
                
                <h2 class="h5 fw-medium text-info mb-3">
                    {{ $department['faculty'] }} &bull; {{ $department['university'] }}
                </h2>

                <p class="lead fs-6 text-light opacity-90 mb-0" style="max-width: 820px;">
                    {{ $department['overview'] }}
                </p>
            </div>

            <div class="col-lg-3 text-lg-end text-start">
                <div class="p-3 rounded-3 bg-white bg-opacity-10 border border-white border-opacity-25 text-center d-inline-block">
                    <div class="fs-1 fw-bold text-info mb-0">1985</div>
                    <div class="small text-white-50 text-uppercase letter-spacing-1">Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision & Mission Grid -->
    <div class="row g-4 mb-4">
        <!-- Visi -->
        <div class="col-lg-5">
            <div class="card card-modern p-4 h-100" style="border-top: 4px solid var(--primary) !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="stat-icon p-2 bg-primary-subtle text-primary rounded-3">
                        <i class="bi bi-eye-fill fs-5"></i>
                    </span>
                    <h3 class="h5 fw-bold mb-0 text-primary">Visi Departemen</h3>
                </div>
                <p class="text-secondary mb-0">
                    {{ $department['vision'] }}
                </p>
            </div>
        </div>

        <!-- Misi -->
        <div class="col-lg-7">
            <div class="card card-modern p-4 h-100" style="border-top: 4px solid #3282B8 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="stat-icon p-2 bg-info-subtle text-primary rounded-3">
                        <i class="bi bi-bullseye fs-5"></i>
                    </span>
                    <h3 class="h5 fw-bold mb-0 text-primary">Misi Departemen</h3>
                </div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    @foreach($department['missions'] as $index => $mission)
                    <li class="d-flex align-items-start gap-2 text-secondary">
                        <span class="badge bg-primary-subtle text-primary rounded-circle px-2 py-1 mt-1 small" style="font-size: 0.72rem;">
                            {{ $index + 1 }}
                        </span>
                        <span>{{ $mission }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- 6 Laboratories of Informatics ITS -->
    <div class="card card-modern p-4 p-md-5 mb-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4 pb-2 border-bottom">
            <div>
                <span class="badge-academic mb-2">Fokus Riset & Keilmuan</span>
                <h3 class="h4 fw-bold mb-1 text-primary">
                    <i class="bi bi-cpu-fill me-2"></i>6 Laboratorium Teknik Informatika ITS
                </h3>
                <p class="text-muted small mb-0">
                    Laboratorium tempat mahasiswa melakukan riset terapan, praktikum berbasis proyek, dan pengembangan tugas akhir.
                </p>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2">
                FTEIC ITS Surabaya
            </span>
        </div>

        <div class="row g-3">
            @foreach($department['laboratories'] as $lab)
            <div class="col-md-6 col-lg-4">
                <div class="card card-modern card-interactive p-4 h-100 bg-light border">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-primary text-white fw-bold px-3 py-1 font-monospace" style="font-size: 0.85rem;">
                            LAB {{ $lab['code'] }}
                        </span>
                        <i class="bi {{ $lab['icon'] }} fs-4 text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark fs-6">{{ $lab['name'] }}</h5>
                    <p class="small text-secondary mb-0">
                        {{ $lab['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Facilities & Contact Card -->
    <div class="row g-4">
        
        <!-- Facilities -->
        <div class="col-lg-7">
            <div class="card card-modern p-4 h-100">
                <h4 class="h5 fw-bold mb-3 text-primary">
                    <i class="bi bi-building-check me-2"></i>Fasilitas Pendukung Akademik
                </h4>
                <div class="row g-2">
                    @foreach($department['facilities'] as $facility)
                    <div class="col-12">
                        <div class="p-3 bg-light rounded-3 d-flex align-items-center gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            <span class="small fw-medium text-dark">{{ $facility }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Department Info & Contact -->
        <div class="col-lg-5">
            <div class="card card-modern p-4 h-100">
                <h4 class="h5 fw-bold mb-3 text-primary">
                    <i class="bi bi-geo-alt-fill me-2"></i>Informasi & Lokasi
                </h4>
                <div class="d-flex flex-column gap-3 small">
                    <div>
                        <div class="text-muted fw-semibold mb-1">Kepala Departemen:</div>
                        <div class="fw-bold text-dark">{{ $department['head'] }}</div>
                    </div>
                    <div>
                        <div class="text-muted fw-semibold mb-1">Alamat Kampus:</div>
                        <div class="text-secondary">{{ $department['contact']['address'] }}</div>
                    </div>
                    <div>
                        <div class="text-muted fw-semibold mb-1">Kontak Resmi:</div>
                        <div class="text-secondary">
                            <div><i class="bi bi-telephone me-1 text-primary"></i> {{ $department['contact']['phone'] }}</div>
                            <div><i class="bi bi-envelope me-1 text-primary"></i> {{ $department['contact']['email'] }}</div>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <a href="{{ $department['contact']['website'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-its w-100">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Kunjungi Website Resmi Informatika ITS
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
