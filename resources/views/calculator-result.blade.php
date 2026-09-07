@extends('layouts.app')

@section('title', 'Hasil Perhitungan Server')

@section('content')
<div class="container py-3">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Breadcrumb Navigation -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('calculator') }}">Kalkulator</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hasil Perhitungan</li>
                </ol>
            </nav>

            @if(isset($error) && $error)
                <!-- ERROR STATE DISPLAY -->
                <div class="card card-modern p-4 p-md-5 mb-4 text-center border-0 shadow-sm" style="border-top: 5px solid #dc3545 !important;">
                    <div class="mb-3">
                        <span class="stat-icon p-3 bg-danger-subtle text-danger rounded-circle d-inline-flex">
                            <i class="bi bi-exclamation-triangle-fill fs-2"></i>
                        </span>
                    </div>

                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-1 rounded-pill mb-2" style="font-size: 0.78rem;">
                        PERHATIAN &bull; ERROR TERKONTROL
                    </span>

                    <h2 class="h3 fw-bold text-danger mb-3">
                        Perhitungan Tidak Dapat Diproses
                    </h2>

                    <div class="alert alert-danger d-inline-block text-start py-3 px-4 mb-4" style="max-width: 600px;">
                        <i class="bi bi-shield-x me-2 fs-5 align-middle"></i>
                        <strong>Keterangan:</strong> {{ $error }}
                    </div>

                    <div class="p-3 bg-light rounded-3 text-start mb-4 border" style="max-width: 600px; margin: 0 auto;">
                        <div class="small fw-bold text-muted mb-2 text-uppercase letter-spacing-1">Parameter Yang Diterima:</div>
                        <ul class="list-unstyled small mb-0 font-monospace">
                            <li><strong>Angka 1:</strong> <code>{{ $angka1 ?? '-' }}</code></li>
                            <li><strong>Angka 2:</strong> <code>{{ $angka2 ?? '-' }}</code></li>
                            <li><strong>Operasi:</strong> <code>{{ $operasi ?? '-' }}</code></li>
                            <li><strong>Controller:</strong> <code>PageController@hitung</code></li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('calculator') }}" class="btn btn-primary-its px-4">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Kalkulator
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-house me-1"></i> Beranda
                        </a>
                    </div>
                </div>

            @else
                <!-- SUCCESS STATE DISPLAY -->
                <div class="card card-modern p-4 p-md-5 mb-4 border-0 shadow-sm">
                    
                    <div class="text-center mb-4">
                        <span class="badge-academic mb-2">
                            <i class="bi bi-check2-circle me-1"></i> Perhitungan Berhasil
                        </span>
                        <h1 class="h3 fw-bold text-dark mb-1">Hasil Perhitungan Server</h1>
                        <p class="text-muted small">
                            URL: <code>/hitung/{{ $angka1 }}/{{ $angka2 }}/{{ $operasi }}</code>
                        </p>
                    </div>

                    <!-- Result Hero Box -->
                    <div class="result-display-box mb-4">
                        <!-- Equation -->
                        <div class="calc-expression font-monospace">
                            {{ $angka1 }} {{ $symbol }} {{ $angka2 }} =
                        </div>

                        <!-- Big Result Number -->
                        <div class="calc-result-number font-monospace" id="result-value">
                            {{ $hasil }}
                        </div>

                        <!-- Full Indonesian Statement required by PRD -->
                        <div class="calc-summary-text bg-white bg-opacity-10 py-2 px-3 rounded-3 d-inline-block border border-white border-opacity-25 mt-3" id="result-sentence">
                            <i class="bi bi-chat-quote-fill me-1 text-info"></i>
                            <strong>{{ $kalimatHasil }}</strong>
                        </div>
                    </div>

                    <!-- Calculation Details Meta Table -->
                    <div class="card bg-light border-0 rounded-3 p-3 mb-4">
                        <div class="row text-center g-2 small">
                            <div class="col-4 border-end">
                                <span class="text-muted d-block">Angka Pertama</span>
                                <strong class="fs-6 font-monospace text-dark">{{ $angka1 }}</strong>
                            </div>
                            <div class="col-4 border-end">
                                <span class="text-muted d-block">Operasi Terpilih</span>
                                <strong class="fs-6 text-primary text-capitalize">{{ $operasi }} ({{ $symbol }})</strong>
                            </div>
                            <div class="col-4">
                                <span class="text-muted d-block">Angka Kedua</span>
                                <strong class="fs-6 font-monospace text-dark">{{ $angka2 }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Action Navigation -->
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('calculator') }}" class="btn btn-primary-its px-4" id="btn-calc-again">
                            <i class="bi bi-arrow-repeat me-1"></i> Hitung Lagi
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-its px-4">
                            <i class="bi bi-house me-1"></i> Kembali ke Beranda
                        </a>
                    </div>

                </div>
            @endif

            <!-- Additional Test Links -->
            <div class="p-3 bg-white rounded-3 border text-center small text-muted">
                <span class="fw-semibold text-dark me-2">Uji Operasi Lainnya:</span>
                <a href="{{ url('/hitung/10/5/tambah') }}" class="text-decoration-none me-3"><i class="bi bi-plus text-primary"></i> Tambah (15)</a>
                <a href="{{ url('/hitung/10/5/kurang') }}" class="text-decoration-none me-3"><i class="bi bi-dash text-primary"></i> Kurang (5)</a>
                <a href="{{ url('/hitung/10/5/kali') }}" class="text-decoration-none me-3"><i class="bi bi-x text-primary"></i> Kali (50)</a>
                <a href="{{ url('/hitung/10/5/bagi') }}" class="text-decoration-none"><i class="bi bi-slash text-primary"></i> Bagi (2)</a>
            </div>

        </div>
    </div>

</div>
@endsection
