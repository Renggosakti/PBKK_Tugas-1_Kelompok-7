@extends('layouts.app')

@section('title', 'Kalkulator')

@section('content')
    <section class="hero">
        <div class="container position-relative">
            <p class="kicker mb-2">Tantangan Bonus</p>
            <h1 class="hero-title mb-3" style="font-size: clamp(2rem, 4.5vw, 3.25rem);">Kalkulator Dinamis</h1>
            <p class="fs-5 mb-0 col-lg-8">
                Dihitung langsung oleh <code class="route-hint">PageController@hitung</code> lewat parameter URL.
            </p>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="calc-card">

                @if ($error)
                    <div class="calc-result danger mb-4">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-3 d-block mb-2"></i>
                        <p class="mb-0 text-danger fw-semibold">{{ $error }}</p>
                    </div>
                @elseif ($hasil !== null)
                    <div class="calc-result success mb-4">
                        <p class="equation mb-2">{{ $angka1 }} {{ $simbol }} {{ $angka2 }} = {{ $hasil }}</p>
                        <p class="mb-0 text-muted">Hasil dari {{ $angka1 }} {{ $operasi }} {{ $angka2 }} adalah {{ $hasil }}.</p>
                    </div>
                @endif

                <div class="surface-card p-4 p-md-5">
                    <form id="kalkulatorForm">
                        <div class="row g-3 align-items-end">
                            <div class="col-5">
                                <label for="angka1" class="form-label small text-muted">Angka 1</label>
                                <input type="number" step="any" class="form-control form-control-lg form-control-dark" id="angka1" value="{{ $angka1 }}" placeholder="10" required>
                            </div>
                            <div class="col-2 text-center">
                                <span class="fs-3 text-muted d-none d-sm-block">&nbsp;</span>
                            </div>
                            <div class="col-5">
                                <label for="angka2" class="form-label small text-muted">Angka 2</label>
                                <input type="number" step="any" class="form-control form-control-lg form-control-dark" id="angka2" value="{{ $angka2 }}" placeholder="5" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="form-label small text-muted d-block">Operasi</label>
                            <div class="btn-group w-100 calc-op-group" role="group">
                                @foreach (['tambah' => 'Tambah (+)', 'kurang' => 'Kurang (−)', 'kali' => 'Kali (×)', 'bagi' => 'Bagi (÷)'] as $value => $label)
                                    <input type="radio" class="btn-check" name="operasi" id="op-{{ $value }}" value="{{ $value }}" autocomplete="off" {{ $operasi === $value ? 'checked' : ($loop->first && !$operasi ? 'checked' : '') }}>
                                    <label class="btn btn-op" for="op-{{ $value }}">{{ $label }}</label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn-accent w-100 justify-content-center border-0 mt-4" style="font-size: 1.05rem;">
                            <i class="bi bi-calculator"></i> Hitung
                        </button>
                    </form>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Contoh akses langsung: <code class="route-hint">/hitung/10/5/kali</code>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('kalkulatorForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const a = document.getElementById('angka1').value;
            const b = document.getElementById('angka2').value;
            const op = document.querySelector('input[name="operasi"]:checked')?.value ?? 'tambah';

            if (a === '' || b === '') {
                return;
            }

            window.location.href = `/hitung/${encodeURIComponent(a)}/${encodeURIComponent(b)}/${encodeURIComponent(op)}`;
        });
    </script>
@endsection
