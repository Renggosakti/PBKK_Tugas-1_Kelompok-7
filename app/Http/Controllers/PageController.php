<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Identitas mahasiswa yang menjalankan tugas sandbox ini.
     */
    private const MAHASISWA = [
        'nama' => 'Himawan Rakha Bhadra',
        'nrp' => '5025241028',
        'program_studi' => 'S1 Teknik Informatika',
        'kampus' => 'Institut Teknologi Sepuluh Nopember (ITS)',
        'kelompok' => 'Kelompok 7 — PBKK B',
        'bio' => 'Mahasiswa Teknik Informatika ITS yang sedang menjalani modul Pemrograman '
            .'Berbasis Kerangka Kerja, berlatih membangun aplikasi web dengan Laravel dari nol.',
    ];

    /**
     * Data anggota kelompok — ditampilkan setara di halaman beranda.
     */
    private const ANGGOTA_KELOMPOK = [
        ['nama' => 'Mochammad Irfan Sandy', 'nrp' => '5025241127'],
        ['nama' => 'Pradhipta Raja', 'nrp' => '5025241055'],
        ['nama' => 'Himawan Rakha Bhadra', 'nrp' => '5025241028'],
        ['nama' => 'M. Najib Bakhruddin', 'nrp' => '5025241230'],
        ['nama' => 'Arya Rangga', 'nrp' => '5025241072'],
        ['nama' => 'Hisyam Syafa', 'nrp' => '5025241130'],
    ];

    /**
     * Satu warna tetap per anggota, dipakai untuk avatar & tint kartu agar konsisten.
     */
    private const PALET_WARNA = ['#e2703b', '#4f7cff', '#22b8a0', '#c8544a', '#8a63d2', '#2b90d9'];

    /**
     * Ide proyek akhir kelompok (data dummy/draft, menunggu kesepakatan bersama).
     */
    private const PROYEK_AKHIR = [
        'nama' => 'EduAgent — Integrated Learning Portal Berbasis Agentic AI',
        'status' => 'Ide Awal (Draft)',
        'latar_belakang' => 'Mahasiswa sering kesulitan menyusun rencana belajar yang konsisten dan '
            .'menemukan materi yang relevan dengan kebutuhan serta kecepatan belajar masing-masing.',
        'solusi' => 'Portal belajar terintegrasi yang ditenagai agent AI otonom: menyusun rencana '
            .'belajar, merekomendasikan materi, memantau progres, dan menjawab pertanyaan mahasiswa '
            .'secara adaptif tanpa perlu instruksi manual di setiap langkah.',
        'fitur' => [
            ['icon' => 'bi-calendar2-week', 'judul' => 'Agentic Study Planner', 'deskripsi' => 'Agent menyusun & menyesuaikan jadwal belajar otomatis.'],
            ['icon' => 'bi-stars', 'judul' => 'Rekomendasi Materi Adaptif', 'deskripsi' => 'Materi disarankan sesuai progres dan gaya belajar.'],
            ['icon' => 'bi-chat-dots', 'judul' => 'Tanya-Jawab Kontekstual', 'deskripsi' => 'Chatbot memahami konteks mata kuliah yang sedang dipelajari.'],
            ['icon' => 'bi-graph-up', 'judul' => 'Dashboard Progres Belajar', 'deskripsi' => 'Visualisasi capaian belajar tiap mahasiswa secara real-time.'],
            ['icon' => 'bi-bell', 'judul' => 'Pengingat & Kalender Tugas', 'deskripsi' => 'Notifikasi otomatis untuk deadline dan sesi belajar.'],
            ['icon' => 'bi-people', 'judul' => 'Kolaborasi Kelompok', 'deskripsi' => 'Ruang diskusi bersama agent sebagai fasilitator belajar.'],
        ],
        'tech_stack' => ['Laravel', 'MySQL', 'LLM API', 'Alpine.js', 'Bootstrap 5'],
    ];

    public function index(): View
    {
        return view('home', [
            'anggota' => $this->anggotaDenganWarna(),
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function project(): View
    {
        return view('project', [
            'proyek' => self::PROYEK_AKHIR,
            'anggota' => $this->anggotaDenganWarna(),
        ]);
    }

    public function anggotaProfile(string $nrp): View
    {
        $orang = collect($this->anggotaDenganWarna())->firstWhere('nrp', $nrp);

        abort_if(!$orang, 404);

        return view('anggota', [
            'orang' => $orang,
            'isAnda' => $orang['nrp'] === self::MAHASISWA['nrp'],
        ]);
    }

    private function anggotaDenganWarna(): array
    {
        return array_map(static function (array $orang): array {
            $orang['warna'] = self::PALET_WARNA[crc32($orang['nama']) % count(self::PALET_WARNA)];

            return $orang;
        }, self::ANGGOTA_KELOMPOK);
    }

    public function kalkulator(): View
    {
        return view('kalkulator', [
            'angka1' => null,
            'angka2' => null,
            'operasi' => null,
            'simbol' => null,
            'hasil' => null,
            'error' => null,
        ]);
    }

    public function hitung(string $angka1, string $angka2, string $operasi): View
    {
        $a = (float) $angka1;
        $b = (float) $angka2;

        $simbol = [
            'tambah' => '+',
            'kurang' => '−',
            'kali' => '×',
            'bagi' => '÷',
        ][$operasi] ?? '?';

        $hasil = null;
        $error = null;

        switch ($operasi) {
            case 'tambah':
                $hasil = $a + $b;
                break;
            case 'kurang':
                $hasil = $a - $b;
                break;
            case 'kali':
                $hasil = $a * $b;
                break;
            case 'bagi':
                if ($b === 0.0) {
                    $error = 'Tidak dapat membagi dengan nol.';
                } else {
                    $hasil = $a / $b;
                }
                break;
            default:
                $error = 'Operasi tidak dikenal.';
        }

        return view('kalkulator', [
            'angka1' => $angka1,
            'angka2' => $angka2,
            'operasi' => $operasi,
            'simbol' => $simbol,
            'hasil' => $hasil !== null ? $this->formatAngka($hasil) : null,
            'error' => $error,
        ]);
    }

    private function formatAngka(float $n): string
    {
        if (fmod($n, 1.0) === 0.0) {
            return number_format($n, 0, '.', '');
        }

        return rtrim(rtrim(number_format($n, 4, '.', ''), '0'), '.');
    }
}
