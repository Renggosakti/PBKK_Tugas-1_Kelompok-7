@extends('layouts.app')

@section('title', 'Kalkulator Server Dinamis')

@section('content')
<div class="container py-3">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Page Heading Card -->
            <div class="text-center mb-4">
                <span class="badge-academic mb-2">
                    <i class="bi bi-cpu me-1"></i> Challenge Fitur Ekstra
                </span>
                <h1 class="display-6 fw-bold text-dark mb-2">Kalkulator Server Dinamis</h1>
                <p class="text-secondary" style="max-width: 580px; margin: 0 auto;">
                    Proses perhitungan dieksekusi langsung di backend oleh <code>PageController@hitung</code> melalui parameter URL Laravel.
                </p>
            </div>

            <!-- Calculator Interactive Form Card -->
            <div class="card card-modern p-4 p-md-5 mb-4 shadow-sm border-0" style="border-top: 5px solid var(--primary) !important;">
                
                <form id="calculator-form" onsubmit="handleCalculate(event)">
                    
                    <div class="row g-3 mb-4">
                        <!-- Angka Pertama -->
                        <div class="col-md-5">
                            <label for="input-angka1" class="form-label fw-bold text-dark small text-uppercase letter-spacing-1">
                                Angka Pertama
                            </label>
                            <input 
                                type="number" 
                                step="any" 
                                class="form-control form-control-custom form-control-lg" 
                                id="input-angka1" 
                                placeholder="Misal: 10" 
                                value="10" 
                                required
                            >
                            <div class="form-text small text-muted">Mendukung bilangan bulat & desimal</div>
                        </div>

                        <!-- Pilihan Operasi -->
                        <div class="col-md-3">
                            <label for="select-operasi" class="form-label fw-bold text-dark small text-uppercase letter-spacing-1">
                                Operasi
                            </label>
                            <select class="form-select form-select-custom form-select-lg" id="select-operasi" required>
                                <option value="tambah">Tambah (+)</option>
                                <option value="kurang">Kurang (-)</option>
                                <option value="kali" selected>Kali (×)</option>
                                <option value="bagi">Bagi (÷)</option>
                            </select>
                            <div class="form-text small text-muted">Pilih operator</div>
                        </div>

                        <!-- Angka Kedua -->
                        <div class="col-md-4">
                            <label for="input-angka2" class="form-label fw-bold text-dark small text-uppercase letter-spacing-1">
                                Angka Kedua
                            </label>
                            <input 
                                type="number" 
                                step="any" 
                                class="form-control form-control-custom form-control-lg" 
                                id="input-angka2" 
                                placeholder="Misal: 5" 
                                value="5" 
                                required
                            >
                            <div class="form-text small text-muted">Hindari angka 0 pada pembagian</div>
                        </div>
                    </div>

                    <!-- URL Preview -->
                    <div class="p-3 bg-light rounded-3 border mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="small fw-semibold text-muted text-uppercase" style="font-size: 0.72rem;">Target URL Parameter:</span>
                            <span class="badge bg-primary-subtle text-primary small">GET Request</span>
                        </div>
                        <code class="fs-6 text-primary fw-bold font-monospace" id="url-preview">
                            /hitung/10/5/kali
                        </code>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary-its btn-lg" id="btn-submit-calc">
                            <i class="bi bi-play-circle me-2"></i> Hitung Sekarang
                        </button>
                    </div>

                </form>

            </div>

            <!-- Quick Testing Presets -->
            <div class="card card-modern p-4 bg-white">
                <h5 class="fw-bold text-primary fs-6 mb-3">
                    <i class="bi bi-lightning-charge-fill text-warning me-1"></i> Quick Test Cases (Sesuai Spesifikasi PRD)
                </h5>
                <p class="small text-muted mb-3">
                    Klik tautan cepat di bawah ini untuk langsung menguji URL parameter controller beserta kasus tepi (edge cases):
                </p>

                <div class="mb-3">
                    <span class="text-dark small fw-semibold d-block mb-2">Operasi Standar:</span>
                    <a href="{{ url('/hitung/10/5/tambah') }}" class="quick-pill" id="test-tambah">
                        <i class="bi bi-plus-lg me-1"></i> /hitung/10/5/tambah &rarr; 15
                    </a>
                    <a href="{{ url('/hitung/10/5/kurang') }}" class="quick-pill" id="test-kurang">
                        <i class="bi bi-dash-lg me-1"></i> /hitung/10/5/kurang &rarr; 5
                    </a>
                    <a href="{{ url('/hitung/10/5/kali') }}" class="quick-pill" id="test-kali">
                        <i class="bi bi-x-lg me-1"></i> /hitung/10/5/kali &rarr; 50
                    </a>
                    <a href="{{ url('/hitung/10/5/bagi') }}" class="quick-pill" id="test-bagi">
                        <i class="bi bi-slash-lg me-1"></i> /hitung/10/5/bagi &rarr; 2
                    </a>
                </div>

                <div>
                    <span class="text-danger small fw-semibold d-block mb-2">Pengujian Kasus Tepi (Error Handling):</span>
                    <a href="{{ url('/hitung/10/0/bagi') }}" class="quick-pill border-danger text-danger bg-danger-subtle" id="test-zero">
                        <i class="bi bi-slash-circle me-1"></i> /hitung/10/0/bagi (Division by Zero)
                    </a>
                    <a href="{{ url('/hitung/10/5/pangkat') }}" class="quick-pill border-warning text-warning-emphasis bg-warning-subtle" id="test-unsupported">
                        <i class="bi bi-question-circle me-1"></i> /hitung/10/5/pangkat (Operasi Tidak Didukung)
                    </a>
                    <a href="{{ url('/hitung/abc/5/tambah') }}" class="quick-pill border-secondary text-secondary bg-light" id="test-nonnumeric">
                        <i class="bi bi-exclamation-circle me-1"></i> /hitung/abc/5/tambah (Input Bukan Angka)
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    const angka1Input = document.getElementById('input-angka1');
    const angka2Input = document.getElementById('input-angka2');
    const operasiSelect = document.getElementById('select-operasi');
    const urlPreview = document.getElementById('url-preview');

    function updatePreview() {
        const a1 = angka1Input.value.trim() || '10';
        const a2 = angka2Input.value.trim() || '5';
        const op = operasiSelect.value || 'kali';
        urlPreview.textContent = `/hitung/${encodeURIComponent(a1)}/${encodeURIComponent(a2)}/${encodeURIComponent(op)}`;
    }

    angka1Input.addEventListener('input', updatePreview);
    angka2Input.addEventListener('input', updatePreview);
    operasiSelect.addEventListener('change', updatePreview);

    function handleCalculate(e) {
        e.preventDefault();
        const a1 = angka1Input.value.trim();
        const a2 = angka2Input.value.trim();
        const op = operasiSelect.value;
        if (a1 !== '' && a2 !== '' && op) {
            window.location.href = `{{ url('/hitung') }}/${encodeURIComponent(a1)}/${encodeURIComponent(a2)}/${encodeURIComponent(op)}`;
        }
    }
</script>
@endpush
