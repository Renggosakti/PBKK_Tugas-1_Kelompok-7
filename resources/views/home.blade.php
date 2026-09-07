@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <div class="container">
            <p class="kicker mb-0">PBKK B · Teknik Informatika ITS</p>
            <h1 class="hero-title">ITS Academic Profile<br><em>Kelompok 7</em></h1>
            <p class="fs-5 mb-4" style="max-width: 38rem;">
                Sistem informasi statik yang menghimpun profil akademik enam anggota kelompok —
                masing-masing membangun sandbox Laravel-nya sendiri, sekaligus menyiapkan satu ide
                besar untuk proyek akhir semester.
            </p>
            <a href="#anggota" class="link-arrow">Lihat semua anggota <i class="bi bi-arrow-down"></i></a>
        </div>
    </section>

    <section class="page-section" id="anggota">
        <div class="container">
            <p class="kicker mb-2">Enam anggota, bobot yang sama</p>
            <h2 class="section-title h3 mb-5">Anggota Kelompok 7</h2>

            <div class="row g-4">
                @foreach ($anggota as $orang)
                    <div class="col-6 col-lg-4">
                        <a href="{{ route('anggota.show', $orang['nrp']) }}" class="member-card" style="--tint: {{ $orang['warna'] }}1a;">
                            <i class="bi bi-arrow-up-right go"></i>
                            <x-avatar :name="$orang['nama']" :color="$orang['warna']" :size="60" />
                            <h3>{{ $orang['nama'] }}</h3>
                            <p class="nrp mb-0">NRP {{ $orang['nrp'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <div class="d-flex flex-wrap gap-4">
                <a href="{{ route('about') }}" class="link-arrow">Profil Jurusan <i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ route('project') }}" class="link-arrow">Rencana Proyek Akhir <i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ route('kalkulator') }}" class="link-arrow">Kalkulator Dinamis <i class="bi bi-arrow-up-right"></i></a>
            </div>
        </div>
    </section>
@endsection
