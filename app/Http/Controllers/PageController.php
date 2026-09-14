<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Beranda (Home)
     * Menampilkan profil mahasiswa, NRP, ringkasan akademik, dan anggota kelompok.
     */
    public function index()
    {
        $student = [
            'name' => 'Arya Rangga',
            'nrp' => '5025241072',
            'major' => 'S1 Teknik Informatika',
            'faculty' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
            'university' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'batch' => '2024',
            'class' => 'Pemrograman Berbasis Kerangka Kerja (PBKK) — Kelas B',
            'group' => 'Kelompok 7',
            'bio' => 'Mahasiswa Departemen Teknik Informatika ITS angkatan 2024 yang memiliki antusiasme tinggi terhadap rekayasa perangkat lunak modern, arsitektur web berbasis kerangka kerja, dan kecerdasan artifisial otonom (Agentic AI). Berkomitmen memadukan solusi komputasi elegan dengan kebutuhan dunia nyata.',
            'status' => 'Mahasiswa Aktif',
            'location' => 'Surabaya, Jawa Timur, Indonesia',
            'github' => 'https://github.com/Renggosakti',
            'skills' => [
                'Laravel & PHP',
                'Web Development',
                'Software Architecture',
                'Agentic AI Systems',
                'Relational & NoSQL Database',
                'Git & GitHub'
            ],
            'stats' => [
                ['label' => 'Mata Kuliah', 'value' => 'PBKK (B)', 'icon' => 'bi-book-half'],
                ['label' => 'Departemen', 'value' => 'Informatika', 'icon' => 'bi-mortarboard'],
                ['label' => 'Angkatan', 'value' => '2024', 'icon' => 'bi-calendar3'],
                ['label' => 'Kelompok', 'value' => 'Kelompok 7', 'icon' => 'bi-people'],
            ]
        ];

        $group_members = [
            [
                'name' => 'Mochammad Irfan Sandy',
                'nrp' => '5025241127',
                'role' => 'Front-End & UI Specialist',
                'avatar_color' => '#0F4C75',
            ],
            [
                'name' => 'Pradhipta Raja',
                'nrp' => '5025241055',
                'role' => 'Systems & Performance',
                'avatar_color' => '#1B262C',
            ],
            [
                'name' => 'Himawan Rakha Bhadra',
                'nrp' => '5025241028',
                'role' => 'AI Model & Logic Engineer',
                'avatar_color' => '#3282B8',
            ],
            [
                'name' => 'M. Najib Bakhruddin',
                'nrp' => '5025241230',
                'role' => 'Backend & Data Architect',
                'avatar_color' => '#0F4C75',
            ],
            [
                'name' => 'Arya Rangga',
                'nrp' => '5025241072',
                'role' => 'Fullstack Developer & Team Lead',
                'avatar_color' => '#0DCAF0',
            ],
            [
                'name' => 'Hisyam Syafa',
                'nrp' => '5025241130',
                'role' => 'QA & Documentation Specialist',
                'avatar_color' => '#20c997',
            ],
        ];

        return view('home', compact('student', 'group_members'));
    }

    /**
     * Halaman Profil Departemen (About)
     * Menampilkan profil singkat Departemen Teknik Informatika ITS.
     */
    public function about()
    {
        $department = [
            'name' => 'Departemen Teknik Informatika',
            'faculty' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
            'university' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'founded' => '1985',
            'accreditation' => 'Akreditasi UNGGUL (BAN-PT) & Terakreditasi Internasional IABEE',
            'head' => 'Prof. Dr. Eng. Chastine Fatichah, S.Kom., M.Kom.',
            'tagline' => 'Advancing Computing Frontiers for Global Impact and Innovation',
            'overview' => 'Departemen Teknik Informatika ITS didirikan pada tahun 1985 dan merupakan salah satu pelopor pendidikan ilmu komputer bereputasi unggul di Indonesia. Departemen ini berfokus pada penguasaan teori komputasi, rekayasa perangkat lunak terdistribusi, sistem kecerdasan artifisial, dan keamanan siber, guna melahirkan lulusan berintelektual tinggi serta berdaya saing global.',
            'vision' => 'Menjadi institusi pendidikan tinggi di bidang informatika yang bereputasi internasional, unggul dalam penelitian inovatif, menghasilkan lulusan beretika luhur, dan adaptif terhadap evolusi teknologi komputasi dunia.',
            'missions' => [
                'Menyelenggarakan pendidikan sarjana dan pascasarjana bidang informatika berstandar internasional dengan kurikulum berbasis capaian pembelajaran (OBE).',
                'Melaksanakan penelitian mutakhir yang berfokus pada kecerdasan komputasi, rekayasa perangkat lunak, sistem cerdas, dan keamanan siber yang bernilai guna tinggi bagi masyarakat.',
                'Mengembangkan program pengabdian kepada masyarakat melalui penerapan teknologi informasi yang solutif dan inklusif.',
                'Memperluas jejaring kerja sama strategis dengan industri teknologi multinasional dan institusi akademik dunia.'
            ],
            'laboratories' => [
                [
                    'code' => 'RPL',
                    'name' => 'Rekayasa Perangkat Lunak (Software Engineering)',
                    'desc' => 'Fokus pada metodologi rekayasa software modern, arsitektur microservices, clean code, DevOps, dan software quality assurance.',
                    'icon' => 'bi-code-square'
                ],
                [
                    'code' => 'KCV',
                    'name' => 'Komputasi Cerdas & Visi (Intelligent Computing & Vision)',
                    'desc' => 'Mengembangkan riset machine learning, deep learning, Agentic AI, computer vision, dan natural language processing.',
                    'icon' => 'bi-cpu'
                ],
                [
                    'code' => 'AJK',
                    'name' => 'Arsitektur & Jaringan Komputer (Net-Centric Computing)',
                    'desc' => 'Mendalami keamanan siber (cybersecurity), cloud computing, sistem terdistribusi skala besar, dan jaringan Internet of Things (IoT).',
                    'icon' => 'bi-hdd-network'
                ],
                [
                    'code' => 'MI',
                    'name' => 'Manajemen Informasi (Information Management)',
                    'desc' => 'Fokus pada big data analytics, information retrieval, knowledge graph, dan sistem tata kelola basis data perusahaan.',
                    'icon' => 'bi-database-check'
                ],
                [
                    'code' => 'IGS',
                    'name' => 'Interaksi, Grafika, dan Seni (Interaction & Computer Graphics)',
                    'desc' => 'Mengembangkan Human-Computer Interaction (HCI), game technology, Virtual Reality (VR), dan Augmented Reality (AR).',
                    'icon' => 'bi-controller'
                ],
                [
                    'code' => 'ALPRO',
                    'name' => 'Algoritma & Pemrograman (Algorithm & Programming)',
                    'desc' => 'Pusat pengasahan komputasi teoretis, desain algoritma mutakhir, competitive programming, dan efisiensi komputasi.',
                    'icon' => 'bi-diagram-2'
                ]
            ],
            'facilities' => [
                'Gedung perkuliahan representatif berfasilitas multimedia interaktif',
                '6 Laboratorium riset dan komputasi berspesifikasi tinggi',
                'Ruang baca departemen dan akses ke jurnal internasional IEEE, ACM, Springer, ScienceDirect',
                'Student lounge & coworking space kolaboratif mahasiswa'
            ],
            'contact' => [
                'address' => 'Gedung Departemen Teknik Informatika ITS, Kampus ITS Sukolilo, Surabaya 60111',
                'phone' => '+62 (031) 5939214',
                'email' => 'informatika@its.ac.id',
                'website' => 'https://www.its.ac.id/informatika/'
            ]
        ];

        return view('about', compact('department'));
    }

    /**
     * Halaman Ide Proyek Agentic AI (Project Idea)
     * Menjelaskan rancangan proyek kelompok berbasis Agentic AI untuk tugas akhir semester.
     */
   /**
     * Halaman Ide Proyek Agentic AI (Project Idea)
     * Menjelaskan rancangan proyek kelompok berbasis Agentic AI untuk tugas akhir semester.
     */
    public function project()
    {
        $project = [
            'title' => 'FlowPilot: Autonomous Web QA, Security Testing & Self-Healing Repair Agent',
            'theme' => 'Agentic AI',
            'scope' => 'Web Application Quality Assurance, Security Testing & Automated Code Repair',
            'summary' => 'FlowPilot adalah platform agentic AI yang secara otonom menjelajahi sebuah aplikasi web, menemukan masalah fungsional, aksesibilitas, performa, hingga keamanan, lalu menelusuri source code di repository GitHub terkait, mendiagnosis akar masalahnya, membuat perbaikan (patch), memvalidasinya lewat automated testing, dan akhirnya membuka Pull Request terverifikasi untuk direview manusia. Berbeda dari chatbot yang cuma menjelaskan, FlowPilot benar-benar bertindak: membuka browser, mengklik, mengisi form, membaca kode, dan mengubah repository.',
            'problem' => 'Proses QA dan perbaikan bug pada aplikasi web umumnya masih sangat manual: developer harus mengetes tiap alur satu per satu, menelusuri log error secara manual, mencari lokasi bug di source code, menulis perbaikan, lalu memverifikasi ulang secara manual pula. Proses ini memakan waktu, rawan human error, dan celah keamanan (seperti Broken Access Control atau IDOR) seringkali baru diketahui setelah dieksploitasi karena scanner otomatis biasa sulit mendeteksi masalah pada level logika bisnis.',
            'target_users' => [
                [
                    'role' => 'Developer & Tim Engineering',
                    'icon' => 'bi-code-slash',
                    'benefit' => 'Mendapat laporan bug fungsional, aksesibilitas, performa, dan keamanan secara otomatis, lengkap dengan Pull Request perbaikan yang sudah teruji, tinggal direview.'
                ],
                [
                    'role' => 'QA Engineer / Tester',
                    'icon' => 'bi-clipboard2-check',
                    'benefit' => 'Terbantu regresi testing otomatis — setiap alur yang pernah gagal akan terus diuji ulang oleh agent tanpa perlu skenario manual berulang.'
                ],
                [
                    'role' => 'Tim Keamanan Aplikasi (AppSec)',
                    'icon' => 'bi-shield-lock',
                    'benefit' => 'Mendapat temuan keamanan berbasis skenario nyata (multi-akun, broken access control, IDOR) yang sulit ditemukan scanner keamanan konvensional.'
                ]
            ],
            'solution' => 'FlowPilot mengorkestrasi beberapa peran agent (browser agent, code agent, security agent) yang berbagi satu model bahasa kecil berbasis CPU, dikoordinasikan oleh Laravel sebagai orchestrator — menjalankan siklus: jelajahi aplikasi → temukan masalah → kumpulkan bukti → telusuri source code → diagnosis → buat patch → uji ulang → buka Pull Request.',
            'agents' => [
                [
                    'name' => 'Browser QA Agent',
                    'role' => 'Eksplorasi & Pengujian Fungsional',
                    'icon' => 'bi-window',
                    'color' => '#0F4C75',
                    'description' => 'Mengendalikan headless Chromium lewat Playwright untuk membuka halaman, mengisi form, mengklik tombol, dan mendeteksi error atau perilaku tak sesuai harapan secara otonom.'
                ],
                [
                    'name' => 'Security Testing Agent',
                    'role' => 'Pengujian Keamanan Berbasis Skenario',
                    'icon' => 'bi-shield-exclamation',
                    'color' => '#3282B8',
                    'description' => 'Bekerja sama dengan OWASP ZAP untuk memantau traffic secara pasif, serta menjalankan skenario multi-akun untuk menemukan celah seperti Broken Access Control dan IDOR.'
                ],
                [
                    'name' => 'Code Diagnosis & Repair Agent',
                    'role' => 'Analisis Source Code & Pembuatan Patch',
                    'icon' => 'bi-git',
                    'color' => '#0DCAF0',
                    'description' => 'Menelusuri repository GitHub terkait bug yang ditemukan, mempersempit konteks kode yang relevan, mendiagnosis akar masalah, lalu menghasilkan patch beserta regression test.'
                ],
                [
                    'name' => 'Verification & PR Agent',
                    'role' => 'Validasi Otomatis & Pembukaan Pull Request',
                    'icon' => 'bi-check2-circle',
                    'color' => '#20c997',
                    'description' => 'Menjalankan test di lingkungan sementara (ephemeral workspace), memverifikasi bug benar-benar teratasi lewat pengujian ulang, lalu membuka Pull Request draf untuk direview manusia.'
                ]
            ],
            'features' => [
                [
                    'title' => 'Autonomous Functional & Accessibility QA',
                    'tag' => 'Pengujian Otomatis',
                    'desc' => 'Menjelajahi aplikasi web layaknya pengguna nyata — mengisi form, mengklik elemen non-standar, hingga menguji navigasi keyboard untuk menemukan masalah fungsional maupun aksesibilitas.'
                ],
                [
                    'title' => 'Multi-Account Security Scenario Testing',
                    'tag' => 'Keamanan Aplikasi',
                    'desc' => 'Menguji celah otorisasi seperti Broken Access Control dan IDOR dengan skenario lintas akun yang sulit ditemukan oleh scanner keamanan biasa.'
                ],
                [
                    'title' => 'Root Cause Diagnosis dari Source Code',
                    'tag' => 'Analisis Kode',
                    'desc' => 'Menelusuri repository GitHub untuk menemukan lokasi kode penyebab bug, dengan mempersempit konteks secara deterministik sebelum diserahkan ke model AI.'
                ],
                [
                    'title' => 'Verified Pull Request Generation',
                    'tag' => 'Perbaikan Terverifikasi',
                    'desc' => 'Membuat branch, patch, dan regression test, menjalankan CI, menguji ulang lewat browser, lalu membuka Pull Request draf — bukan sekadar saran, tapi perbaikan yang sudah terbukti bekerja.'
                ]
            ],
            'impacts' => [
                [
                    'metric' => 'Efisiensi Siklus QA',
                    'highlight' => 'Deteksi & Verifikasi Otomatis',
                    'desc' => 'Memangkas waktu pengujian manual berulang dengan agent yang menjelajah dan menguji aplikasi secara mandiri.'
                ],
                [
                    'metric' => 'Cakupan Temuan Keamanan',
                    'highlight' => 'Skenario Multi-Akun',
                    'desc' => 'Menemukan celah logika bisnis (broken access control, IDOR) yang umumnya terlewat oleh scanner keamanan konvensional.'
                ],
                [
                    'metric' => 'Kualitas Perbaikan Kode',
                    'highlight' => 'Human-in-the-Loop',
                    'desc' => 'Setiap perbaikan divalidasi otomatis lewat testing sebelum diajukan sebagai Pull Request, dan tetap memerlukan review manusia sebelum di-merge.'
                ]
            ]
        ];

        return view('project', compact('project'));
    }
    /**
     * Halaman Antarmuka Form Kalkulator (Calculator Landing Page)
     * Memberikan kemudahan interaksi kepada pengguna sebelum diarahkan ke route challenge.
     */
    public function calculator()
    {
        return view('calculator');
    }

    /**
     * Route Challenge: Dynamic Calculator via URL Parameters
     * Menghitung dua angka dengan operasi tertentu langsung melalui parameter URL:
     * GET /hitung/{angka1}/{angka2}/{operasi}
     */
    public function hitung($angka1, $angka2, $operasi)
    {
        // 1. Validasi input numerik
        if (!is_numeric($angka1) || !is_numeric($angka2)) {
            return view('calculator-result', [
                'error' => 'Input angka tidak valid. Pastikan kedua parameter dalam URL berupa bilangan numerik (contoh: /hitung/10/5/kali).',
                'angka1' => $angka1,
                'angka2' => $angka2,
                'operasi' => $operasi,
            ]);
        }

        $num1 = (float) $angka1;
        $num2 = (float) $angka2;
        $operasiNormalized = strtolower(trim($operasi));

        // 2. Pemetaan simbol matematika dan kalimat operator
        $operationMap = [
            'tambah' => ['symbol' => '+', 'word' => 'tambah'],
            'kurang' => ['symbol' => '-', 'word' => 'kurang'],
            'kali'   => ['symbol' => '×', 'word' => 'kali'],
            'bagi'   => ['symbol' => '÷', 'word' => 'bagi'],
        ];

        // 3. Validasi operasi yang didukung
        if (!array_key_exists($operasiNormalized, $operationMap)) {
            return view('calculator-result', [
                'error' => "Operasi '{$operasi}' tidak didukung. Operasi yang didukung hanya: tambah, kurang, kali, dan bagi.",
                'angka1' => $angka1,
                'angka2' => $angka2,
                'operasi' => $operasi,
            ]);
        }

        // 4. Penanganan kasus pembagian dengan nol (Division by Zero)
        if ($operasiNormalized === 'bagi' && $num2 == 0) {
            return view('calculator-result', [
                'error' => 'Pembagian dengan nol tidak diperbolehkan dalam matematika dasar.',
                'angka1' => $angka1,
                'angka2' => $angka2,
                'operasi' => $operasi,
            ]);
        }

        // 5. Eksekusi kalkulasi
        $hasil = 0;
        switch ($operasiNormalized) {
            case 'tambah':
                $hasil = $num1 + $num2;
                break;
            case 'kurang':
                $hasil = $num1 - $num2;
                break;
            case 'kali':
                $hasil = $num1 * $num2;
                break;
            case 'bagi':
                $hasil = $num1 / $num2;
                break;
        }

        // 6. Format tampilan bilangan agar bersih (misal 15 bukan 15.0000)
        $hasilFormatted = (fmod($hasil, 1) !== 0.0) ? rtrim(rtrim(number_format($hasil, 4, '.', ''), '0'), '.') : (string) (int) $hasil;
        $num1Formatted  = (fmod($num1, 1) !== 0.0) ? rtrim(rtrim(number_format($num1, 4, '.', ''), '0'), '.') : (string) (int) $num1;
        $num2Formatted  = (fmod($num2, 1) !== 0.0) ? rtrim(rtrim(number_format($num2, 4, '.', ''), '0'), '.') : (string) (int) $num2;

        $symbol = $operationMap[$operasiNormalized]['symbol'];
        $word   = $operationMap[$operasiNormalized]['word'];

        // Sesuai spesifikasi PRD: "Hasil dari 10 kali 5 adalah 50"
        $kalimatHasil = "Hasil dari {$num1Formatted} {$word} {$num2Formatted} adalah {$hasilFormatted}";

        return view('calculator-result', [
            'angka1' => $num1Formatted,
            'angka2' => $num2Formatted,
            'operasi' => $word,
            'symbol' => $symbol,
            'hasil' => $hasilFormatted,
            'kalimatHasil' => $kalimatHasil,
            'error' => null,
        ]);
    }
}
