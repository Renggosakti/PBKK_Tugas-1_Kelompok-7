@extends('layouts.app')

@section('title', 'Rencana Proyek')

@section('content')
    <section class="hero">
        <div class="container">
            <p class="kicker mb-2">Rencana Proyek Akhir</p>
            <h1 class="hero-title mb-3" style="font-size: clamp(1.9rem, 4.5vw, 3.1rem);">{{ $proyek['nama'] }}</h1>
            <span class="badge-status">{{ $proyek['status'] }}</span>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="surface-card p-4 h-100">
                        <p class="mono-label mb-2">Latar Belakang</p>
                        <p class="text-muted mb-0">{{ $proyek['latar_belakang'] }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="surface-card p-4 h-100">
                        <p class="mono-label mb-2">Solusi yang Diusulkan</p>
                        <p class="text-muted mb-0">{{ $proyek['solusi'] }}</p>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning mt-4 mb-0" role="alert">
                <div class="small">
                    Konten pada halaman ini masih berupa <strong>data dummy / draft awal</strong> untuk
                    keperluan tugas mandiri minggu ini. Ide final akan disepakati dan disempurnakan bersama
                    seluruh anggota kelompok sebelum dikerjakan di akhir semester.
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <p class="kicker mb-2">Rencana Fitur</p>
            <h2 class="section-title h3 mb-4">Fitur Utama</h2>
            <div>
                @foreach ($proyek['fitur'] as $i => $fitur)
                    <div class="feature-row">
                        <span class="num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div>
                            <h3 class="h6 mb-1">{{ $fitur['judul'] }}</h3>
                            <p class="text-muted small mb-0">{{ $fitur['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="kicker mb-2 mt-5">Rencana Teknologi</p>
            <h2 class="section-title h3 mb-4">Tech Stack (Sementara)</h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($proyek['tech_stack'] as $tech)
                    <span class="badge-soft">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <p class="kicker mb-2">Tim Pengembang</p>
            <h2 class="section-title h3 mb-4">Dikerjakan oleh Kelompok 7</h2>
            <div class="d-flex flex-wrap gap-3">
                @foreach ($anggota as $orang)
                    <a href="{{ route('anggota.show', $orang['nrp']) }}" class="member-chip">
                        <x-avatar :name="$orang['nama']" :color="$orang['warna']" :size="36" />
                        <span>{{ $orang['nama'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
