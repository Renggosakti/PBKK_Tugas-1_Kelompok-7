@extends('layouts.app')

@section('title', 'Ide Proyek Agentic AI Kelompok 7')

@section('content')
<div class="container py-3">

    <!-- Project Header & Hero -->
    <div class="card card-modern p-4 p-md-5 mb-4 position-relative border-0 shadow-sm" style="background: linear-gradient(135deg, #0F4C75 0%, #1B262C 100%); color: #ffffff;">
        <div class="row align-items-center g-4">
            <div class="col-lg-9">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="badge bg-info text-dark fw-bold px-3 py-1 rounded-pill" style="font-size: 0.78rem;">
                        <i class="bi bi-robot me-1"></i> {{ $project['theme'] }}
                    </span>
                    <span class="badge bg-white bg-opacity-20 text-white fw-semibold px-3 py-1 rounded-pill" style="font-size: 0.78rem;">
                        <i class="bi bi-people me-1"></i> Rencana Proyek Akhir Kelompok 7
                    </span>
                    <span class="badge bg-white bg-opacity-20 text-white fw-semibold px-3 py-1 rounded-pill" style="font-size: 0.78rem;">
                        PBKK Kelas B
                    </span>
                </div>

                <h1 class="display-6 fw-bold mb-2 text-white">
                    {{ $project['title'] }}
                </h1>
                
                <h2 class="h5 fw-normal text-info mb-3">
                    {{ $project['scope'] }}
                </h2>

                <p class="lead fs-6 text-light opacity-90 mb-0" style="max-width: 820px;">
                    {{ $project['summary'] }}
                </p>
            </div>

            <div class="col-lg-3 text-lg-end text-start">
                <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-25 text-center d-inline-block shadow-sm">
                    <i class="bi bi-diagram-3-fill fs-1 text-info mb-2 d-block"></i>
                    <div class="fw-bold text-white small">Multi-Agent System</div>
                    <div class="small text-white-50">4 Spesialis Otonom</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Problem & Solution Overview -->
    <div class="row g-4 mb-4">
        <!-- Problem -->
        <div class="col-lg-6">
            <div class="card card-modern p-4 h-100" style="border-left: 5px solid #dc3545 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="stat-icon p-2 bg-danger-subtle text-danger rounded-3">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    </span>
                    <h3 class="h5 fw-bold mb-0 text-danger">Latar Belakang & Masalah</h3>
                </div>
                <p class="text-secondary mb-0">
                    {{ $project['problem'] }}
                </p>
            </div>
        </div>

        <!-- Proposed Solution -->
        <div class="col-lg-6">
            <div class="card card-modern p-4 h-100" style="border-left: 5px solid #198754 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="stat-icon p-2 bg-success-subtle text-success rounded-3">
                        <i class="bi bi-lightbulb-fill fs-5"></i>
                    </span>
                    <h3 class="h5 fw-bold mb-0 text-success">Solusi Berbasis Agentic AI</h3>
                </div>
                <p class="text-secondary mb-0">
                    {{ $project['solution'] }}
                </p>
            </div>
        </div>
    </div>

    <!-- Multi-Agent Architecture Showcase -->
    <div class="card card-modern p-4 p-md-5 mb-4">
        <div class="mb-4 pb-2 border-bottom">
            <span class="badge-academic mb-2">Arsitektur Agen Otonom</span>
            <h3 class="h4 fw-bold text-primary mb-1">
                <i class="bi bi-cpu-fill me-2"></i>4 Agen Spesialis dalam Arsitektur FlowPilot
            </h3>
            <p class="text-muted small mb-0">
                Setiap agen memiliki memori peran khusus (role persona), tools execution, dan mekanisme evaluasi reflektif.
            </p>
        </div>

        <div class="row g-3">
            @foreach($project['agents'] as $agent)
            <div class="col-md-6 col-lg-3">
                <div class="card card-modern card-interactive p-4 h-100 bg-white border" style="border-top: 4px solid {{ $agent['color'] }} !important;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon p-2 rounded-3" style="background-color: rgba(15, 76, 117, 0.08); color: {{ $agent['color'] }};">
                            <i class="bi {{ $agent['icon'] }} fs-4"></i>
                        </div>
                        <span class="badge bg-light text-dark border small" style="font-size: 0.7rem;">
                            Agent
                        </span>
                    </div>
                    <h5 class="fw-bold mb-1 text-dark fs-6">{{ $agent['name'] }}</h5>
                    <div class="small fw-semibold text-primary mb-2 font-monospace" style="font-size: 0.78rem;">
                        {{ $agent['role'] }}
                    </div>
                    <p class="small text-secondary mb-0">
                        {{ $agent['description'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Target Users Grid -->
    <div class="card card-modern p-4 p-md-5 mb-4">
        <div class="mb-4 pb-2 border-bottom">
            <span class="badge-academic mb-2">Penerima Manfaat</span>
            <h3 class="h4 fw-bold text-primary mb-1">
                <i class="bi bi-person-check-fill me-2"></i>Target Pengguna Sistem
            </h3>
            <p class="text-muted small mb-0">
                FlowPilot dirancang untuk mendukung tiga pemangku kepentingan utama dalam siklus pengembangan dan pengujian aplikasi web.
            </p>
        </div>

        <div class="row g-3">
            @foreach($project['target_users'] as $user)
            <div class="col-md-4">
                <div class="p-4 bg-light rounded-4 h-100 border">
                    <div class="stat-icon p-3 bg-white text-primary rounded-3 d-inline-block mb-3 shadow-sm">
                        <i class="bi {{ $user['icon'] }} fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-2">{{ $user['role'] }}</h5>
                    <p class="small text-secondary mb-0">
                        {{ $user['benefit'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Main Features Grid -->
    <div class="card card-modern p-4 p-md-5 mb-4">
        <div class="mb-4 pb-2 border-bottom">
            <span class="badge-academic mb-2">Fitur Utama Sistem</span>
            <h3 class="h4 fw-bold text-primary mb-1">
                <i class="bi bi-stars me-2"></i>Fitur Unggulan FlowPilot
            </h3>
            <p class="text-muted small mb-0">
                Fitur dirancang untuk memecahkan hambatan akademik secara bertahap dan terotomatisasi.
            </p>
        </div>

        <div class="row g-3">
            @foreach($project['features'] as $feature)
            <div class="col-md-6">
                <div class="p-4 border rounded-3 h-100 bg-white shadow-sm">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1 small">
                            {{ $feature['tag'] }}
                        </span>
                        <i class="bi bi-check-circle text-primary"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-2">{{ $feature['title'] }}</h5>
                    <p class="small text-secondary mb-0">
                        {{ $feature['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Expected Impact Metrics -->
    <div class="row g-4">
        <div class="col-12">
            <div class="card card-modern p-4 p-md-5" style="background: linear-gradient(135deg, #F8FAFC 0%, #EDF4F8 100%);">
                <div class="text-center mb-4">
                    <span class="badge-academic mb-2">Dampak & Manfaat</span>
                    <h3 class="h4 fw-bold text-primary mb-1">Expected Impact</h3>
                    <p class="text-muted small">Tolok ukur keberhasilan implementasi platform bagi kualitas dan keamanan aplikasi web</p>
                </div>

                <div class="row g-3">
                    @foreach($project['impacts'] as $impact)
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded-4 border text-center h-100 shadow-sm">
                            <div class="h3 fw-bold text-primary mb-1">{{ $impact['highlight'] }}</div>
                            <div class="fw-semibold text-dark small mb-2">{{ $impact['metric'] }}</div>
                            <p class="small text-muted mb-0">{{ $impact['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection