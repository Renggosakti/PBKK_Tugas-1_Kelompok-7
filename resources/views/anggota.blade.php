@extends('layouts.app')

@section('title', $orang['nama'])

@section('content')
    <section class="hero pb-0">
        <div class="container">
            <a href="{{ route('home') }}#anggota" class="btn-outline-dark-pill mb-4">
                <i class="bi bi-arrow-left"></i> Kembali ke Tim
            </a>

            <div class="row align-items-center gy-4">
                <div class="col-lg-8">
                    <p class="kicker mb-2">
                        Anggota Kelompok 7 — PBKK B
                        @if ($isAnda)
                            &middot; ini Anda
                        @endif
                    </p>
                    <h1 class="hero-title" style="font-size: clamp(2.25rem, 5vw, 3.5rem);">{{ $orang['nama'] }}</h1>
                    <span class="badge-soft mb-4"><i class="bi bi-person-badge"></i> NRP {{ $orang['nrp'] }}</span>

                    <div class="row g-3 mt-3">
                        <div class="col-sm-6">
                            <div class="surface-card p-3">
                                <p class="text-faint small mb-1">Program Studi</p>
                                <p class="mb-0 fw-semibold" style="color: var(--text);">S1 Teknik Informatika</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="surface-card p-3">
                                <p class="text-faint small mb-1">Kampus</p>
                                <p class="mb-0 fw-semibold" style="color: var(--text);">Institut Teknologi Sepuluh Nopember</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <x-avatar :name="$orang['nama']" :color="$orang['warna']" :size="150" />
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="surface-card p-4 p-md-5">
                <h2 class="h5 mb-2">Tentang</h2>
                <p class="mb-0">
                    {{ $orang['nama'] }} merupakan salah satu anggota Kelompok 7 pada mata kuliah Pemrograman
                    Berbasis Kerangka Kerja, turut membangun proyek akhir kelompok berbasis Agentic AI di
                    penghujung semester ini.
                </p>
            </div>
        </div>
    </section>
@endsection
