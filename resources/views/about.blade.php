@extends('layouts.app')

@section('title', 'About')

@section('content')
    <section class="hero">
        <div class="container">
            <p class="kicker mb-2">Profil Jurusan</p>
            <h1 class="hero-title" style="font-size: clamp(2.25rem, 5vw, 3.5rem);">Departemen Teknik Informatika</h1>
            <p class="fs-5 mb-0 col-lg-8">
                Institut Teknologi Sepuluh Nopember (ITS), Kampus Sukolilo, Surabaya.
            </p>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-7">
                    <p class="kicker mb-2">Tentang</p>
                    <h2 class="section-title h3 mb-3">Mendidik Talenta Informatika Masa Depan</h2>
                    <p class="text-muted">
                        Departemen Teknik Informatika ITS merupakan salah satu program studi rumpun ilmu
                        komputer tertua dan terkemuka di Indonesia. Departemen ini membina jenjang pendidikan
                        Sarjana, Magister, dan Doktor, dengan fokus mencetak lulusan yang menguasai fondasi
                        keilmuan informatika sekaligus mampu menerapkannya untuk menyelesaikan persoalan nyata
                        di masyarakat dan industri.
                    </p>
                    <p class="text-muted mb-0">
                        Melalui perpaduan kurikulum yang terus diperbarui, riset terapan, serta kolaborasi
                        dengan mitra industri dan akademik, Departemen Teknik Informatika ITS berkomitmen
                        menghasilkan lulusan yang unggul, adaptif terhadap perkembangan teknologi, dan
                        berdaya saing di tingkat nasional maupun global.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="surface-card p-4">
                        <p class="mono-label mb-3">Jenjang Pendidikan</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge-soft">Sarjana (S1)</span>
                            <span class="badge-soft">Magister (S2)</span>
                            <span class="badge-soft">Doktor (S3)</span>
                        </div>
                        <hr class="my-4" style="border-color: var(--border);">
                        <p class="mono-label mb-2">Lokasi</p>
                        <p class="mb-0 text-muted small">
                            Kampus ITS Sukolilo, Surabaya, Jawa Timur, Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <p class="kicker mb-2">Fokus Keilmuan</p>
            <h2 class="section-title h3 mb-4">Bidang Kompetensi Utama</h2>
            <div>
                @foreach ([
                    ['judul' => 'Rekayasa Perangkat Lunak', 'deskripsi' => 'Perancangan, pengembangan, dan pengujian aplikasi berskala besar.'],
                    ['judul' => 'Kecerdasan Buatan & Data Science', 'deskripsi' => 'Machine learning, data mining, dan sistem cerdas.'],
                    ['judul' => 'Sistem Informasi Enterprise', 'deskripsi' => 'Perancangan sistem informasi untuk kebutuhan organisasi.'],
                    ['judul' => 'Jaringan & Keamanan Siber', 'deskripsi' => 'Infrastruktur jaringan serta keamanan sistem dan data.'],
                    ['judul' => 'Komputasi Multimedia & Game', 'deskripsi' => 'Pengolahan citra, grafika komputer, dan pengembangan game.'],
                    ['judul' => 'Komputasi Awan & Terdistribusi', 'deskripsi' => 'Arsitektur sistem terdistribusi dan layanan berbasis cloud.'],
                ] as $i => $bidang)
                    <div class="feature-row">
                        <span class="num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div>
                            <h3 class="h6 mb-1">{{ $bidang['judul'] }}</h3>
                            <p class="text-muted small mb-0">{{ $bidang['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
