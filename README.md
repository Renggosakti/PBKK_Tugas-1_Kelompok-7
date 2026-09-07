# Sistem Informasi Statik Profil Mahasiswa — ITS Academic Profile

**Kelompok 7 — Pemrograman Berbasis Kerangka Kerja (PBKK) Kelas B**  
Departemen Teknik Informatika, Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)  
Institut Teknologi Sepuluh Nopember (ITS), Surabaya

---

## Anggota Kelompok 7

| No | Nama Lengkap | NRP | Peran Utama |
|---|---|---|---|
| 1 | **Mochammad Irfan Sandy** | `5025241127` | Front-End & UI Specialist |
| 2 | **Pradhipta Raja** | `5025241055` | Systems & Performance |
| 3 | **Himawan Rakha Bhadra** | `5025241028` | AI Model & Logic Engineer |
| 4 | **M. Najib Bakhruddin** | `5025241230` | Backend & Data Architect |
| 5 | **Arya Rangga** | `5025241072` | Fullstack Developer & Team Lead |
| 6 | **Hisyam Syafa** | `5025241130` | QA & Documentation Specialist |

---

## Tentang Aplikasi

**ITS Academic Profile** adalah aplikasi web berbasis framework **Laravel** yang menyajikan:
1. Profil akademik mahasiswa (identitas, keahlian, dan ringkasan akademik).
2. Profil resmi Departemen Teknik Informatika ITS (sejarah, visi, misi, akreditasi IABEE & BAN-PT, serta 6 laboratorium riset).
3. Rancangan ide proyek inovasi **Agentic AI** (*Synthetix ITS*) untuk tugas akhir semester.
4. Fitur ekstra challenge: **Kalkulator Dinamis Server-Side** yang memproses perhitungan matematika langsung melalui parameter URL dengan *controlled error handling*.

Aplikasi dibangun dengan mematuhi prinsip arsitektur Laravel yang bersih: **URL → Router → Controller → Blade View**. Seluruh request halaman diproses secara terpusat oleh `PageController` tanpa adanya Closure untuk rendering view pada `routes/web.php`.

---

## Alur Kerja Arsitektur Aplikasi

```text
Browser (HTTP Request)
        ↓
routes/web.php (Named Routes, Zero Closures)
        ↓
app/Http/Controllers/PageController.php
  ├── index()        → Data Mahasiswa & Kelompok 7
  ├── about()        → Data Profil Departemen Informatika ITS
  ├── project()      → Data Rancangan Proyek Agentic AI
  ├── calculator()   → Antarmuka Form Kalkulator
  └── hitung()       → Validasi & Eksekusi Operasi Matematika
        ↓
resources/views/ (Blade Engine + Bootstrap 5 CDN + Custom CSS)
  ├── layouts/app.blade.php
  ├── home.blade.php
  ├── about.blade.php
  ├── project.blade.php
  ├── calculator.blade.php
  └── calculator-result.blade.php
        ↓
Browser (Rendered Responsive HTML5)
```

---

## Daftar Rute Halaman

| HTTP Method | Rute | Nama Route | Controller Handler | Deskripsi Tampilan |
|---|---|---|---|---|
| `GET` | `/` | `home` | `PageController@index` | Beranda profil mahasiswa & data Kelompok 7 |
| `GET` | `/about` | `about` | `PageController@about` | Profil Departemen Teknik Informatika ITS |
| `GET` | `/project-idea` | `project` | `PageController@project` | Ide proyek Agentic AI (*Synthetix ITS*) |
| `GET` | `/calculator` | `calculator` | `PageController@calculator` | Form interaktif input kalkulator |
| `GET` | `/kalkulator` | `kalkulator` | `PageController@calculator` | Alias form kalkulator |
| `GET` | `/hitung/{angka1}/{angka2}/{operasi}` | `hitung` | `PageController@hitung` | Hasil kalkulasi dinamis server-side |

---

## Fitur Dynamic Calculator

Fitur kalkulator menerima parameter URL dinamis:
```text
/hitung/{angka1}/{angka2}/{operasi}
```

### Operasi yang Didukung:
- `tambah` (`+`): Contoh `/hitung/10/5/tambah` &rarr; menghasilkan `15`
- `kurang` (`-`): Contoh `/hitung/10/5/kurang` &rarr; menghasilkan `5`
- `kali` (`×`): Contoh `/hitung/10/5/kali` &rarr; menghasilkan `50`
- `bagi` (`÷`): Contoh `/hitung/10/5/bagi` &rarr; menghasilkan `2`

Format teks luaran sesuai spesifikasi:
> *"Hasil dari 10 kali 5 adalah 50"*

### Controlled Error Handling:
- **Pembagian dengan Nol**: `/hitung/10/0/bagi`  
  *Output:* Alert aman *"Pembagian dengan nol tidak diperbolehkan dalam matematika dasar."* (mencegah fatal `DivisionByZeroError`).
- **Operasi Tidak Didukung**: `/hitung/10/5/pangkat`  
  *Output:* Alert aman *"Operasi 'pangkat' tidak didukung. Operasi yang didukung hanya: tambah, kurang, kali, dan bagi."*
- **Input Bukan Angka**: `/hitung/abc/5/tambah`  
  *Output:* Alert aman *"Input angka tidak valid. Pastikan kedua parameter dalam URL berupa bilangan numerik."*

---

## Kebutuhan Sistem (System Requirements)

- PHP: `^8.2` (Diverifikasi berjalan stabil pada PHP `8.5.9`)
- Composer: `^2.0`
- Web Browser: Google Chrome, Mozilla Firefox, Microsoft Edge, atau Safari modern

---

## Panduan Instalasi & Menjalankan Proyek

1. **Clone repository & checkout branch:**
   ```bash
   git clone https://github.com/Renggosakti/PBKK_Tugas-1_Kelompok-7.git
   cd PBKK_Tugas-1_Kelompok-7
   git checkout 2-WebLaravel
   ```

2. **Pasang dependensi Composer:**
   ```bash
   composer install
   ```

3. **Siapkan file environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Jalankan local development server:**
   ```bash
   php artisan serve
   ```

5. **Akses aplikasi melalui browser:**
   ```text
   http://127.0.0.1:8000
   ```

---

## Struktur Proyek Utama

```text
PBKK_Tugas-1_Kelompok-7/
├── app/
│   └── Http/
│       └── Controllers/
│           └── PageController.php      # Controller terpusat 5 aksi halaman
├── public/
│   └── css/
│       └── app.css                     # Custom styling modern ITS
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Shared master layout + Bootstrap 5
│       ├── home.blade.php              # Beranda mahasiswa
│       ├── about.blade.php             # Profil departemen
│       ├── project.blade.php           # Ide proyek Agentic AI
│       ├── calculator.blade.php        # Form input kalkulator
│       └── calculator-result.blade.php # Hasil perhitungan & error handling
├── routes/
│   └── web.php                         # Routing tanpa Closure
├── .env.example
├── composer.json
├── PRD_ITS_Academic_Profile_Laravel.md
└── README.md
```

---

## Skenario Pengujian (Test Cases)

| ID | URL Pengujian | Ekspektasi Hasil | Status |
|---|---|---|---|
| TC-01 | `GET /` | Halaman Home tampil, memuat identitas Arya Rangga & NRP 5025241072 | &check; PASS |
| TC-02 | `GET /about` | Halaman About tampil, memuat profil Teknik Informatika ITS & 6 Lab | &check; PASS |
| TC-03 | `GET /project-idea` | Halaman Project tampil, memuat konsep Synthetix Multi-Agent AI | &check; PASS |
| TC-04 | `GET /calculator` | Form input kalkulator interaktif tampil lengkap | &check; PASS |
| TC-05 | `GET /hitung/10/5/tambah` | Hasil = `15` ("Hasil dari 10 tambah 5 adalah 15") | &check; PASS |
| TC-06 | `GET /hitung/10/5/kurang` | Hasil = `5` ("Hasil dari 10 kurang 5 adalah 5") | &check; PASS |
| TC-07 | `GET /hitung/10/5/kali` | Hasil = `50` ("Hasil dari 10 kali 5 adalah 50") | &check; PASS |
| TC-08 | `GET /hitung/10/5/bagi` | Hasil = `2` ("Hasil dari 10 bagi 5 adalah 2") | &check; PASS |
| TC-09 | `GET /hitung/10/0/bagi` | Error terkontrol: "Pembagian dengan nol tidak diperbolehkan" | &check; PASS |
| TC-10 | `GET /hitung/10/5/pangkat` | Error terkontrol: "Operasi tidak didukung" | &check; PASS |
| TC-11 | `GET /hitung/abc/5/tambah` | Error terkontrol: "Input angka tidak valid" | &check; PASS |
| TC-12 | Responsive Mode (375px) | Layout adaptif mobile, navbar toggler collapse berfungsi sempurna | &check; PASS |
