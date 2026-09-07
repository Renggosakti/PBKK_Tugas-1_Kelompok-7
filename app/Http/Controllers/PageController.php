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
    public function project()
    {
        $project = [
            'title' => 'Synthetix ITS: Autonomous Multi-Agent Academic Advisor & Capstone Co-Pilot',
            'theme' => 'Agentic AI',
            'scope' => 'Higher Education & Academic Workflow Automation',
            'summary' => 'Synthetix ITS adalah platform otonom berbasis Agentic AI yang dirancang sebagai ekosistem pendamping akademik cerdas bagi mahasiswa Teknik Informatika ITS. Sistem ini memanfaatkan kolaborasi multi-agen yang proaktif dan memiliki kemampuan perencana tugas (task planning), pemanfaatan tools/API kurikulum (tool use), serta evaluasi mandiri (self-reflection).',
            'problem' => 'Mahasiswa sering menghadapi fragmentasi informasi akademik: kebingungan dalam merencanakan pemilihan mata kuliah peminatan (FRS) yang sejalan dengan target karir, lambatnya iterasi konsultasi penentuan ide tugas akhir/capstone, serta keterbatasan waktu dosen wali untuk memberikan asistensi personal yang intensif dan real-time. Sistem portal akademik saat ini hanya bersifat administratif statis dan tidak menawarkan rekomendasi terpersonalisasi.',
            'target_users' => [
                [
                    'role' => 'Mahasiswa Teknik Informatika ITS',
                    'icon' => 'bi-person-badge',
                    'benefit' => 'Mendapatkan rekomendasi FRS adaptif, simulasi kelayakan skripsi/capstone, asistensi coding lab mandiri, dan petunjuk pathway karir keilmuan.'
                ],
                [
                    'role' => 'Dosen Pembimbing & Dosen Wali',
                    'icon' => 'bi-person-workspace',
                    'benefit' => 'Menerima ringkasan otomatis kesiapan proposal mahasiswa, visualisasi roadmap studi, dan deteksi dini hambatan akademik.'
                ],
                [
                    'role' => 'Laboratorium Riset Departemen',
                    'icon' => 'bi-building-gear',
                    'benefit' => 'Mencocokkan minat mahasiswa dengan topik penelitian aktif yang sedang berjalan di laboratorium (RPL, KCV, AJK, MI, IGS, ALPRO).'
                ]
            ],
            'solution' => 'Platform Synthetix mengorkestrasi 4 agen spesialis otonom yang saling berkoordinasi secara dinamis untuk menyelesaikan tugas akademik kompleks tanpa memerlukan instruksi manual berulang.',
            'agents' => [
                [
                    'name' => 'Planner & Orchestrator Agent',
                    'role' => 'Perencanaan & Dekomposisi Tugas',
                    'icon' => 'bi-diagram-3-fill',
                    'color' => '#0F4C75',
                    'description' => 'Menganalisis profil mahasiswa, mengurai target kelulusan menjadi milestone capaian semesteran, serta mendelegasikan tugas ke sub-agen spesialis.'
                ],
                [
                    'name' => 'Curriculum & FRS Retrieval Agent',
                    'role' => 'Domain Knowledge & Aturan Akademik',
                    'icon' => 'bi-book-fill',
                    'color' => '#3282B8',
                    'description' => 'Membaca basis pengetahuan kurikulum Informatika ITS, aturan prasyarat SKS, silabus mata kuliah, dan capaian kompetensi akreditasi IABEE.'
                ],
                [
                    'name' => 'Lab & Code Mentor Agent',
                    'role' => 'Bimbingan Teknis & Praktikum',
                    'icon' => 'bi-code-slash',
                    'color' => '#0DCAF0',
                    'description' => 'Memberikan telaah kode (code review), petunjuk debugging konseptual, dan rekomendasi referensi tanpa memberikan jawaban langsung demi menjaga integritas akademik.'
                ],
                [
                    'name' => 'Capstone Ideation & Literature Agent',
                    'role' => 'Sintesis Riset & Paper Ilmiah',
                    'icon' => 'bi-lightbulb-fill',
                    'color' => '#20c997',
                    'description' => 'Membantu mahasiswa mengeksplorasi novelty topik skripsi, mensintesis paper terbaru dari IEEE/ACM, serta memetakan kesesuaian topik dengan lab di ITS.'
                ]
            ],
            'features' => [
                [
                    'title' => 'Autonomous FRS Pathway Simulator',
                    'tag' => 'Perencanaan Studi',
                    'desc' => 'Simulasi cerdas rencana pengambilan SKS semester depan berdasarkan riwayat IPK, minat laboratorium keilmuan, dan batas maksimum SKS.'
                ],
                [
                    'title' => 'Intelligent Capstone Feasibility Checker',
                    'tag' => 'Tugas Akhir',
                    'desc' => 'Analisis kebaruan (novelty) dan kelayakan teknis proposal tugas akhir yang dicocokkan dengan arah riset dosen Teknik Informatika ITS.'
                ],
                [
                    'title' => 'Multi-Agent Advisory Debate Room',
                    'tag' => 'Kolaborasi Agen',
                    'desc' => 'Fitur di mana dua agen dengan perspektif berbeda (misal: Praktikal Industri vs Teoretis Riset) mendiskusikan topik mahasiswa untuk menyajikan pandangan seimbang.'
                ],
                [
                    'title' => 'Contextual Reflection & Proactive Alert',
                    'tag' => 'Monitoring Adaptif',
                    'desc' => 'Penyimpanan memori jangka panjang mahasiswa yang mendeteksi penurunan performa praktikum dan memberikan notifikasi proaktif berisi saran remedial.'
                ]
            ],
            'impacts' => [
                [
                    'metric' => 'Efisiensi Perencanaan Studi',
                    'highlight' => '60% Lebih Cepat',
                    'desc' => 'Memangkas waktu eksplorasi mata kuliah dan penyiapan berkas FRS sebelum konsultasi langsung dengan dosen wali.'
                ],
                [
                    'metric' => 'Kualitas Proposal Tugas Akhir',
                    'highlight' => 'Literature Mapping Akurat',
                    'desc' => 'Memastikan topik yang diajukan memiliki referensi ilmiah yang solid dan relevan dengan roadmap riset laboratorium.'
                ],
                [
                    'metric' => 'Integritas Akademik & Pembelajaran Mandiri',
                    'highlight' => 'Socratic Mentoring',
                    'desc' => 'Mendorong pemahaman konsep logika pemrograman secara mandiri dengan metode asistensi interaktif.'
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
