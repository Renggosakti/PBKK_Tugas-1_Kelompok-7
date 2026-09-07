# PRD — ITS Academic Profile
## Laravel Sandbox Pertama

**Document Type:** Product Requirements Document  
**Project:** Sistem Informasi Statik Profil Mahasiswa — ITS Academic Profile  
**Framework Utama:** Laravel  
**Frontend:** Blade + Bootstrap 5 via CDN  
**Project Type:** Web Application  
**Scope:** Tugas Mandiri Pemrograman Berbasis Kerangka Kerja  
**Status:** Ready for Development  

---

## 1. Ringkasan Produk

**ITS Academic Profile** adalah aplikasi web berbasis **Laravel** yang menampilkan profil akademik mahasiswa secara statik, profil singkat Departemen Teknik Informatika ITS, serta ide proyek **Agentic AI** yang akan dikembangkan bersama kelompok pada akhir semester.

Tujuan utama tugas adalah memastikan mahasiswa dapat melakukan setup Laravel, memahami alur navigasi dasar **URL → Router → Controller → Blade View**, membiasakan penggunaan Git/GitHub, serta mampu melakukan presentasi dan demo teknis aplikasi.

Aplikasi harus dibangun menggunakan pola Laravel yang jelas. Seluruh halaman harus diproses melalui **`PageController`** dan tidak diperbolehkan menggunakan Closure pada `routes/web.php` untuk langsung merender view.

Selain fitur wajib, aplikasi juga akan mengimplementasikan challenge berupa:

- Kalkulator dinamis.
- Bootstrap 5 via CDN.
- Navbar.
- Desain clean.
- Responsive layout untuk mobile dan laptop.
- Error handling dasar.
- Reusable Blade layout.

---

# 2. Tujuan Produk

## 2.1 Tujuan Utama

Aplikasi harus memenuhi tujuan berikut:

1. Memastikan project Laravel dapat berjalan dengan baik pada local development environment.
2. Menerapkan alur Laravel:

   ```text
   URL
     ↓
   routes/web.php
     ↓
   PageController
     ↓
   Blade View
     ↓
   Browser
   ```

3. Menggunakan controller sebagai penghubung antara route dan view.
4. Menampilkan profil mahasiswa.
5. Menampilkan Nama Lengkap dan NRP.
6. Menampilkan profil singkat Departemen Teknik Informatika ITS.
7. Menampilkan ide proyek Agentic AI kelompok.
8. Mengimplementasikan kalkulator dinamis.
9. Menghasilkan UI yang clean dan mudah dipahami.
10. Membuat seluruh halaman responsive.
11. Menyiapkan project agar layak dipresentasikan.
12. Membuat source code mudah dipublikasikan melalui Git/GitHub.

---

# 3. Product Goals

| ID | Goal |
|---|---|
| PG-01 | Semua route wajib dapat diakses tanpa error |
| PG-02 | Seluruh route halaman menggunakan `PageController` |
| PG-03 | Tidak terdapat Closure untuk merender Blade View di `routes/web.php` |
| PG-04 | Home menampilkan Nama Lengkap dan NRP |
| PG-05 | About menampilkan profil singkat Departemen Teknik Informatika ITS |
| PG-06 | Project menampilkan ide/sub-tema Agentic AI |
| PG-07 | Kalkulator mendukung tambah, kurang, kali, dan bagi |
| PG-08 | UI terlihat clean dan konsisten |
| PG-09 | Website nyaman digunakan melalui handphone maupun laptop |
| PG-10 | Struktur source code mudah dijelaskan ketika presentasi |

---

# 4. Non-Goals

Hal-hal berikut **tidak menjadi bagian wajib dari project**:

- Authentication.
- Login.
- Register.
- Admin dashboard.
- Database mahasiswa.
- CRUD data mahasiswa.
- API REST.
- Role & permission.
- Multi-user system.
- Backend admin panel.
- Real-time communication.
- Pembayaran.
- Deployment production.
- Integrasi external API.

Project difokuskan pada fundamental Laravel:

```text
Route → Controller → Blade
```

Karena tugas mendeskripsikan aplikasi sebagai **Sistem Informasi Statik Profil Mahasiswa**, penggunaan database tidak diperlukan untuk scope utama.

---

# 5. Target User

## 5.1 Mahasiswa

Sebagai mahasiswa, pengguna ingin:

- Melihat profil akademiknya.
- Melihat NRP dan informasi pribadi.
- Melihat informasi jurusan.
- Melihat ide proyek Agentic AI.
- Menggunakan kalkulator.
- Menavigasi halaman dengan mudah.

---

## 5.2 Dosen / Evaluator

Sebagai evaluator, dosen harus dapat:

- Membuka aplikasi tanpa error.
- Memeriksa routing Laravel.
- Memeriksa penggunaan controller.
- Memeriksa Blade View.
- Melakukan pengujian kalkulator.
- Melihat tampilan melalui desktop/mobile.
- Memeriksa source code GitHub.

---

# 6. Scope Fitur

Aplikasi memiliki empat area utama:

```text
Home
About
Project Idea
Calculator
```

Dengan route hasil kalkulator:

```text
/hitung/{angka1}/{angka2}/{operasi}
```

---

# 7. Sitemap

```text
ITS Academic Profile
│
├── Home
│   └── /
│
├── About
│   └── /about
│
├── Project Idea
│   └── /project-idea
│
└── Calculator
    ├── /calculator
    │
    └── /hitung/{angka1}/{angka2}/{operasi}
```

> `/calculator` merupakan route tambahan yang direkomendasikan dalam PRD ini agar item **Kalkulator** pada navbar memiliki halaman input yang usable. Requirement asli tugas yang wajib tetap berupa `/hitung/{angka1}/{angka2}/{operasi}`.

---

# 8. Route Specification

## 8.1 Route Matrix

| Method | Route | Controller | Method | View | Status |
|---|---|---|---|---|---|
| GET | `/` | `PageController` | `index()` | `home.blade.php` | Wajib |
| GET | `/about` | `PageController` | `about()` | `about.blade.php` | Wajib |
| GET | `/project-idea` | `PageController` | `project()` | `project.blade.php` | Wajib |
| GET | `/calculator` | `PageController` | `calculator()` | `calculator.blade.php` | Tambahan UX |
| GET | `/hitung/{angka1}/{angka2}/{operasi}` | `PageController` | `hitung()` | `calculator-result.blade.php` | Challenge |

---

# 9. Laravel Routing Requirement

## 9.1 Requirement Utama

Seluruh route harus diarahkan menuju `PageController`.

**Dilarang:**

```php
Route::get('/', function () {
    return view('home');
});
```

**Target implementasi:**

```php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])
    ->name('home');

Route::get('/about', [PageController::class, 'about'])
    ->name('about');

Route::get('/project-idea', [PageController::class, 'project'])
    ->name('project');

Route::get('/calculator', [PageController::class, 'calculator'])
    ->name('calculator');

Route::get(
    '/hitung/{angka1}/{angka2}/{operasi}',
    [PageController::class, 'hitung']
)->name('hitung');
```

Requirement **tanpa Closure untuk rendering halaman** adalah aturan arsitektur eksplisit dari tugas.

---

# 10. Struktur Project

Struktur minimal yang direkomendasikan:

```text
project-root/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── PageController.php
│
├── public/
│   └── css/
│       └── app.css
│
├── resources/
│   └── views/
│       │
│       ├── layouts/
│       │   └── app.blade.php
│       │
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── project.blade.php
│       ├── calculator.blade.php
│       └── calculator-result.blade.php
│
├── routes/
│   └── web.php
│
├── .env
├── composer.json
└── README.md
```

---

# 11. Blade Architecture

Semua halaman menggunakan layout yang sama:

```text
layouts/app.blade.php
```

Struktur layout:

```text
HTML
│
├── <head>
│   ├── Meta
│   ├── Bootstrap CDN
│   └── Custom CSS
│
<body>
│
├── Navbar
│
├── Main Content
│   └── @yield('content')
│
└── Footer
```

Contoh pattern Blade:

```blade
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- page content -->

@endsection
```

Tujuan reusable layout:

- Tidak menduplikasi navbar.
- Tidak menduplikasi Bootstrap import.
- Tidak menduplikasi footer.
- Memudahkan maintenance.
- Menunjukkan pemahaman Blade.

---

# 12. PageController

Controller utama:

```text
app/Http/Controllers/PageController.php
```

Controller minimal memiliki method:

```php
index()
about()
project()
calculator()
hitung($angka1, $angka2, $operasi)
```

---

# 13. Functional Requirement — Home

## FR-HOME-01

Route:

```text
GET /
```

Controller:

```text
PageController@index
```

View:

```text
home.blade.php
```

Halaman Home wajib menampilkan:

```text
Selamat Datang
Nama Lengkap
NRP
```

---

## 13.1 Konten Rekomendasi

Agar website terasa lengkap namun tetap sederhana, Home dapat menampilkan:

- Greeting.
- Nama mahasiswa.
- NRP.
- Biodata singkat.
- Status sebagai mahasiswa.
- Quick navigation.
- Highlight Project Idea.

---

## 13.2 Data

Data disiapkan melalui controller.

Contoh:

```php
public function index()
{
    $student = [
        'name' => 'Nama Lengkap',
        'nrp' => 'NRP',
        'bio' => 'Biodata singkat mahasiswa.',
    ];

    return view('home', compact('student'));
}
```

Blade tidak menjadi tempat menyimpan business logic.

---

# 14. Functional Requirement — About

## FR-ABOUT-01

Route:

```text
GET /about
```

Controller:

```text
PageController@about
```

View:

```text
about.blade.php
```

Halaman harus berisi profil singkat **Departemen Teknik Informatika ITS**.

---

## 14.1 Konten

Struktur konten:

```text
About
│
├── Judul
│
├── Profil Singkat Departemen
│
└── Informasi Pendukung
```

Isi utama tetap harus berupa profil singkat Departemen Teknik Informatika ITS.

Detail faktual tambahan yang tidak terdapat dalam dokumen tugas sebaiknya hanya dimasukkan jika mahasiswa sudah memiliki sumber yang benar.

---

# 15. Functional Requirement — Project Idea

## FR-PROJECT-01

Route:

```text
GET /project-idea
```

Controller:

```text
PageController@project
```

View:

```text
project.blade.php
```

Halaman wajib menjelaskan sub-tema platform **Agentic AI** yang akan diangkat kelompok untuk proyek akhir semester.

---

## 15.1 Struktur Informasi Project

Supaya isi lebih mudah dipresentasikan, informasi disusun menjadi:

### Project Title

```text
[Nama Project Agentic AI]
```

### Problem

```text
Permasalahan apa yang ingin diselesaikan?
```

### Target User

```text
Siapa pengguna utama sistem?
```

### Proposed Solution

```text
Bagaimana Agentic AI membantu menyelesaikan permasalahan?
```

### Main Features

Contoh struktur:

```text
Feature 1
Feature 2
Feature 3
Feature 4
```

### Expected Impact

```text
Apa manfaat yang diharapkan dari sistem?
```

---

# 16. Functional Requirement — Dynamic Calculator

Challenge kalkulator pada dokumen meminta route berikut:

```text
GET /hitung/{angka1}/{angka2}/{operasi}
```

Operasi yang harus didukung:

```text
tambah
kurang
kali
bagi
```

Perhitungan dilakukan di controller dan hasilnya ditampilkan secara dinamis pada halaman web.

Contoh wajib:

```text
/hitung/10/5/kali
```

menghasilkan:

```text
Hasil dari 10 kali 5 adalah 50
```

---

# 17. Calculator Operation Rules

## 17.1 Tambah

URL:

```text
/hitung/10/5/tambah
```

Perhitungan:

```text
10 + 5 = 15
```

Output:

```text
Hasil dari 10 tambah 5 adalah 15
```

---

## 17.2 Kurang

URL:

```text
/hitung/10/5/kurang
```

Perhitungan:

```text
10 - 5 = 5
```

Output:

```text
Hasil dari 10 kurang 5 adalah 5
```

---

## 17.3 Kali

URL:

```text
/hitung/10/5/kali
```

Perhitungan:

```text
10 × 5 = 50
```

Output:

```text
Hasil dari 10 kali 5 adalah 50
```

---

## 17.4 Bagi

URL:

```text
/hitung/10/5/bagi
```

Perhitungan:

```text
10 ÷ 5 = 2
```

Output:

```text
Hasil dari 10 bagi 5 adalah 2
```

---

# 18. Calculator Controller Logic

Logic direkomendasikan berada di controller.

Contoh struktur:

```php
public function hitung($angka1, $angka2, $operasi)
{
    if (!is_numeric($angka1) || !is_numeric($angka2)) {
        abort(404);
    }

    $angka1 = (float) $angka1;
    $angka2 = (float) $angka2;

    switch ($operasi) {
        case 'tambah':
            $hasil = $angka1 + $angka2;
            break;

        case 'kurang':
            $hasil = $angka1 - $angka2;
            break;

        case 'kali':
            $hasil = $angka1 * $angka2;
            break;

        case 'bagi':
            if ($angka2 == 0) {
                return view('calculator-result', [
                    'error' => 'Pembagian dengan nol tidak diperbolehkan.',
                ]);
            }

            $hasil = $angka1 / $angka2;
            break;

        default:
            return view('calculator-result', [
                'error' => 'Operasi tidak didukung.',
            ]);
    }

    return view('calculator-result', compact(
        'angka1',
        'angka2',
        'operasi',
        'hasil'
    ));
}
```

Validasi angka, invalid operation, dan division-by-zero merupakan tambahan robustness dari PRD supaya aplikasi tidak error ketika didemokan.

---

# 19. Calculator Landing Page

Karena navbar diwajibkan memiliki menu:

```text
Home
About
Project
Kalkulator
```

maka PRD merekomendasikan halaman:

```text
GET /calculator
```

Halaman ini bukan pengganti route challenge.

Fungsinya hanya membuat kalkulator lebih mudah digunakan.

---

## 19.1 Calculator Form

Field:

```text
Angka Pertama
Operasi
Angka Kedua
```

Operator:

```text
Tambah
Kurang
Kali
Bagi
```

Button:

```text
Hitung Sekarang
```

---

## 19.2 Flow

```text
User membuka /calculator
        ↓
Input angka pertama
        ↓
Pilih operasi
        ↓
Input angka kedua
        ↓
Klik Hitung
        ↓
Browser diarahkan ke
/hitung/{angka1}/{angka2}/{operasi}
        ↓
PageController menghitung
        ↓
calculator-result.blade.php
        ↓
Hasil ditampilkan
```

---

# 20. UI Requirements

Dokumen tugas meminta integrasi **Bootstrap 5 atau Tailwind CSS melalui CDN**, navbar pada bagian atas, dan layout responsive pada handphone serta laptop.

Untuk PRD ini dipilih **Bootstrap 5 via CDN** agar implementasinya sederhana dan sesuai scope pertemuan pertama.

---

# 21. UI Design Direction

## 21.1 Style

Arah desain:

```text
Clean
Academic
Minimal
Modern
Professional
Responsive
```

Hindari:

```text
Gradient berlebihan
Animasi berlebihan
Shadow sangat besar
Terlalu banyak warna
Terlalu banyak card
Background ramai
Komponen dekoratif yang tidak diperlukan
```

---

# 22. Color System

Palet yang direkomendasikan:

| Token | Value | Penggunaan |
|---|---|---|
| Primary | `#0F4C75` | Navbar, button, heading |
| Primary Dark | `#0A3654` | Hover |
| Accent | `#0DCAF0` | Highlight kecil |
| Background | `#F8FAFC` | Page background |
| Surface | `#FFFFFF` | Card |
| Text Primary | `#1F2937` | Main text |
| Text Secondary | `#64748B` | Description |
| Border | `#E2E8F0` | Card border |
| Success | Bootstrap success | Success state |
| Danger | Bootstrap danger | Error state |

Warna tersebut merupakan rekomendasi desain PRD dan bukan warna wajib dari dokumen tugas.

---

# 23. Typography

Gunakan font yang sederhana.

Direkomendasikan:

```text
font-family:
Inter, system-ui, -apple-system, BlinkMacSystemFont,
"Segoe UI", sans-serif;
```

Apabila tidak ingin menambah Google Fonts:

```text
system-ui
```

sudah cukup.

---

## 23.1 Typography Scale

```text
Hero Heading
40–48px desktop
30–36px mobile

Page Heading
30–36px desktop
26–30px mobile

Section Heading
20–24px

Body
16px

Small Text
14px
```

---

# 24. Spacing System

Gunakan spacing konsisten:

```text
4px
8px
12px
16px
24px
32px
48px
64px
```

Bootstrap utility yang direkomendasikan:

```text
p-3
p-4
py-5
mb-3
mb-4
gap-3
gap-4
```

---

# 25. Border Radius

Gunakan radius ringan:

```css
border-radius: 12px;
```

atau:

```css
border-radius: 16px;
```

Tidak perlu menggunakan card dengan bentuk terlalu bulat.

---

# 26. Shadow

Gunakan shadow tipis:

```css
box-shadow:
0 10px 30px rgba(15, 23, 42, 0.06);
```

Tujuan:

- Memisahkan card dari background.
- Tetap mempertahankan visual clean.

---

# 27. Navbar UI

Navbar berada pada semua halaman.

Struktur:

```text
┌──────────────────────────────────────────────────────────┐
│ ITS Academic Profile       Home About Project Calculator │
└──────────────────────────────────────────────────────────┘
```

Desktop:

```text
Brand                                  Navigation
```

Mobile:

```text
Brand                            [☰]
```

Menu:

```text
Home
About
Project
Kalkulator
```

---

## 27.1 Navbar Behavior

Navbar harus:

- Responsive.
- Menggunakan Bootstrap navbar.
- Collapse pada mobile.
- Menampilkan active navigation state.
- Tidak terlalu tinggi.
- Memiliki visual clean.
- Tetap mudah digunakan pada layar kecil.

---

## 27.2 Active State

Contoh ketika berada pada route `/`:

```text
Home
```

diberi style aktif.

Implementasi Blade dapat menggunakan:

```blade
{{ request()->routeIs('home') ? 'active' : '' }}
```

---

# 28. Global Page Layout

Layout desktop:

```text
┌─────────────────────────────────────────────────┐
│                     NAVBAR                      │
├─────────────────────────────────────────────────┤
│                                                 │
│                  PAGE CONTENT                   │
│                                                 │
│                                                 │
├─────────────────────────────────────────────────┤
│                     FOOTER                      │
└─────────────────────────────────────────────────┘
```

Gunakan:

```html
<div class="container">
```

agar konten tidak terlalu melebar.

---

# 29. Home UI

## 29.1 Desktop Wireframe

```text
┌──────────────────────────────────────────────────────────┐
│ NAVBAR                                                   │
├──────────────────────────────────────────────────────────┤
│                                                          │
│  Selamat Datang 👋                                       │
│                                                          │
│  [Nama Lengkap]                                          │
│  NRP [XXXXXXXXXX]                                        │
│                                                          │
│  Biodata singkat mahasiswa...                            │
│                                                          │
│  [ Lihat Project ]   [ Tentang Jurusan ]                 │
│                                                          │
├──────────────────────────────────────────────────────────┤
│                                                          │
│   ┌──────────────┐ ┌──────────────┐ ┌──────────────┐     │
│   │ About        │ │ Project      │ │ Calculator   │     │
│   │              │ │              │ │              │     │
│   └──────────────┘ └──────────────┘ └──────────────┘     │
│                                                          │
├──────────────────────────────────────────────────────────┤
│ FOOTER                                                   │
└──────────────────────────────────────────────────────────┘
```

---

## 29.2 Mobile Wireframe

```text
┌──────────────────────┐
│ ITS Profile      [☰] │
├──────────────────────┤
│                      │
│ Selamat Datang 👋    │
│                      │
│ [Nama Lengkap]       │
│ NRP XXXXXXXX         │
│                      │
│ Biodata mahasiswa    │
│                      │
│ [Lihat Project]      │
│                      │
│ ┌──────────────────┐ │
│ │ About            │ │
│ └──────────────────┘ │
│                      │
│ ┌──────────────────┐ │
│ │ Project          │ │
│ └──────────────────┘ │
│                      │
│ ┌──────────────────┐ │
│ │ Calculator       │ │
│ └──────────────────┘ │
│                      │
├──────────────────────┤
│ Footer               │
└──────────────────────┘
```

---

# 30. About UI

Struktur:

```text
Page Badge
About Department

Judul:
Departemen Teknik Informatika ITS

Description:
Profil singkat departemen

Informasi pendukung
```

Wireframe:

```text
┌────────────────────────────────────────────────┐
│ NAVBAR                                         │
├────────────────────────────────────────────────┤
│                                                │
│ About                                          │
│                                                │
│ Departemen Teknik Informatika ITS              │
│                                                │
│ ┌────────────────────────────────────────────┐ │
│ │                                            │ │
│ │ Profil singkat departemen...               │ │
│ │                                            │ │
│ └────────────────────────────────────────────┘ │
│                                                │
├────────────────────────────────────────────────┤
│ FOOTER                                         │
└────────────────────────────────────────────────┘
```

---

# 31. Project Idea UI

Wireframe:

```text
┌─────────────────────────────────────────────────────┐
│ NAVBAR                                              │
├─────────────────────────────────────────────────────┤
│                                                     │
│ Project Idea                                        │
│                                                     │
│ [Nama Project Agentic AI]                           │
│                                                     │
│ Deskripsi singkat                                   │
│                                                     │
│ ┌───────────────────┐ ┌───────────────────────────┐ │
│ │ Problem           │ │ Proposed Solution         │ │
│ │                   │ │                           │ │
│ └───────────────────┘ └───────────────────────────┘ │
│                                                     │
│ Target User                                         │
│                                                     │
│ Main Features                                       │
│                                                     │
│ • Feature 1                                         │
│ • Feature 2                                         │
│ • Feature 3                                         │
│                                                     │
├─────────────────────────────────────────────────────┤
│ FOOTER                                              │
└─────────────────────────────────────────────────────┘
```

---

# 32. Calculator UI

Wireframe desktop:

```text
┌───────────────────────────────────────────────┐
│ NAVBAR                                        │
├───────────────────────────────────────────────┤
│                                               │
│              Kalkulator Dinamis               │
│                                               │
│      ┌─────────────────────────────────┐      │
│      │                                 │      │
│      │ Angka Pertama                   │      │
│      │ [________________________]       │      │
│      │                                 │      │
│      │ Operasi                         │      │
│      │ [ Tambah                  ▼ ]   │      │
│      │                                 │      │
│      │ Angka Kedua                     │      │
│      │ [________________________]       │      │
│      │                                 │      │
│      │ [       Hitung Sekarang      ]  │      │
│      │                                 │      │
│      └─────────────────────────────────┘      │
│                                               │
│ Contoh URL: /hitung/10/5/kali                 │
│                                               │
├───────────────────────────────────────────────┤
│ FOOTER                                        │
└───────────────────────────────────────────────┘
```

---

# 33. Calculator Result UI

Success state:

```text
┌─────────────────────────────────────────────┐
│              Hasil Perhitungan              │
│                                             │
│                    10                       │
│                     ×                       │
│                     5                       │
│                ─────────                    │
│                    50                       │
│                                             │
│ Hasil dari 10 kali 5 adalah 50             │
│                                             │
│ [ Hitung Lagi ]                            │
└─────────────────────────────────────────────┘
```

---

## 33.1 Error State

Division by zero:

```text
┌─────────────────────────────────────────────┐
│                 Perhatian                   │
│                                             │
│ Pembagian dengan nol tidak diperbolehkan.  │
│                                             │
│ [ Kembali ke Kalkulator ]                  │
└─────────────────────────────────────────────┘
```

---

# 34. Responsive Requirement

Responsiveness wajib menjadi bagian pengujian karena tugas secara eksplisit meminta visual web responsive ketika diuji melalui **handphone maupun laptop**.

---

## 34.1 Mobile

Target minimum:

```text
360px
```

Expected behavior:

- Navbar collapse.
- Tidak ada horizontal scroll.
- Card menjadi satu kolom.
- Heading mengecil.
- Padding menyesuaikan.
- Button minimal memenuhi lebar yang nyaman.
- Form menggunakan full width.
- Text tetap terbaca.
- Section tidak bertumpuk secara salah.

---

## 34.2 Tablet

Target:

```text
768px+
```

Expected behavior:

- Beberapa card dapat menjadi dua kolom.
- Form tetap memiliki max-width.
- Content menggunakan spacing sedang.

---

## 34.3 Desktop

Target:

```text
992px+
```

Expected behavior:

- Layout menggunakan whitespace lebih luas.
- Card dapat menggunakan 2–3 kolom.
- Hero tidak memenuhi seluruh lebar secara berlebihan.
- Text container tetap memiliki max-width.

---

# 35. Bootstrap Requirement

Bootstrap menggunakan CDN sesuai requirement challenge.

Contoh struktur:

```html
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css"
    rel="stylesheet"
>
```

Bootstrap JavaScript digunakan untuk navbar collapse:

```html
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js">
</script>
```

Implementasi final sebaiknya menggunakan URL CDN Bootstrap 5 yang valid dan konsisten antara CSS dan JS.

---

# 36. Custom CSS

Bootstrap tetap menjadi framework utama.

Custom CSS hanya digunakan untuk polish visual.

Contoh:

```css
body {
    background: #f8fafc;
    color: #1f2937;
}

.navbar {
    background: rgba(255, 255, 255, 0.95);
    border-bottom: 1px solid #e2e8f0;
}

.hero-section {
    padding: 5rem 0;
}

.profile-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
}

.section-title {
    color: #0f4c75;
}

@media (max-width: 576px) {
    .hero-section {
        padding: 3rem 0;
    }
}
```

---

# 37. UI Component Specification

## 37.1 Button

Primary:

```text
Background: Primary
Text: White
Border Radius: 8–10px
```

Secondary:

```text
White background
Primary border
Primary text
```

---

## 37.2 Card

```text
Background: white
Border: #E2E8F0
Radius: 12–16px
Shadow: subtle
Padding: 24px
```

---

## 37.3 Input

```text
Height: nyaman untuk touch
Label selalu terlihat
Placeholder sederhana
Border Bootstrap default
Focus state tetap jelas
```

---

## 37.4 Alert

Gunakan:

```text
alert-success
alert-danger
alert-warning
```

sesuai kebutuhan.

---

# 38. Accessibility Basic

Walaupun bukan requirement eksplisit tugas, UI harus mengikuti praktik dasar:

- Menggunakan semantic heading.
- Satu `h1` utama per page.
- Input memiliki `label`.
- Button menggunakan elemen `<button>`.
- Link menggunakan `<a>`.
- Kontras text cukup jelas.
- Tidak menyampaikan informasi hanya melalui warna.
- Navbar mobile bisa dibuka dengan keyboard.
- Image, jika digunakan, memiliki `alt`.

---

# 39. Content Requirements

## 39.1 Student Data

Data yang harus tersedia:

```yaml
student:
  name: "[Nama Lengkap]"
  nrp: "[NRP]"
  bio: "[Biodata singkat]"
```

---

## 39.2 Department Data

```yaml
department:
  name: "Departemen Teknik Informatika ITS"
  summary: "[Profil singkat departemen]"
```

---

## 39.3 Project Data

```yaml
project:
  title: "[Nama proyek]"
  theme: "Agentic AI"
  problem: "[Permasalahan]"
  target_user: "[Target pengguna]"
  solution: "[Konsep solusi]"
  features:
    - "[Feature 1]"
    - "[Feature 2]"
    - "[Feature 3]"
```

---

# 40. Error Handling

Aplikasi tidak boleh menghasilkan halaman error Laravel akibat input umum yang dapat diprediksi.

---

## 40.1 Division by Zero

Input:

```text
/hitung/10/0/bagi
```

Expected:

```text
Pembagian dengan nol tidak diperbolehkan.
```

Bukan:

```text
DivisionByZeroError
```

---

## 40.2 Unsupported Operation

Input:

```text
/hitung/10/5/pangkat
```

Expected:

```text
Operasi tidak didukung.
```

atau HTTP error terkontrol.

---

## 40.3 Non-Numeric Input

Input:

```text
/hitung/abc/5/tambah
```

Expected:

```text
Input angka tidak valid.
```

atau response `404/422` yang terkontrol.

---

# 41. Non-Functional Requirements

## NFR-01 — Responsive

Website harus dapat digunakan pada:

```text
Mobile
Tablet
Laptop
Desktop
```

---

## NFR-02 — Maintainability

Code harus:

- Terstruktur.
- Mudah dibaca.
- Menggunakan reusable Blade layout.
- Tidak menduplikasi navbar.
- Tidak mencampurkan perhitungan dengan Blade.

---

## NFR-03 — Performance

Karena project bersifat sederhana:

- Tidak ada library frontend berat.
- Tidak ada query database.
- Tidak ada API eksternal.
- Halaman harus terasa cepat pada local environment.

---

## NFR-04 — Stability

Seluruh route utama harus bebas fatal error.

---

## NFR-05 — Presentation Readiness

Source code harus mudah dijelaskan selama demo.

Mahasiswa harus dapat menunjukkan:

```text
web.php
PageController.php
Blade Views
Calculator Logic
Bootstrap
Responsive UI
```

---

# 42. Browser Support

Minimum target:

```text
Google Chrome terbaru
Microsoft Edge terbaru
Firefox modern
Mobile Chrome
Mobile Safari modern
```

Tidak diperlukan optimasi khusus untuk browser lama.

---

# 43. Acceptance Criteria — Home

## AC-HOME-01

**Given**

Aplikasi Laravel sedang berjalan.

**When**

User membuka:

```text
/
```

**Then**

- HTTP response sukses.
- `PageController@index` dijalankan.
- `home.blade.php` dirender.
- Nama mahasiswa tampil.
- NRP mahasiswa tampil.

---

# 44. Acceptance Criteria — About

## AC-ABOUT-01

**When**

User membuka:

```text
/about
```

**Then**

- `PageController@about` dijalankan.
- `about.blade.php` dirender.
- Profil singkat Departemen Teknik Informatika ITS terlihat.

---

# 45. Acceptance Criteria — Project

## AC-PROJECT-01

**When**

User membuka:

```text
/project-idea
```

**Then**

- `PageController@project` dijalankan.
- `project.blade.php` dirender.
- Penjelasan mengenai sub-tema Agentic AI terlihat.

---

# 46. Acceptance Criteria — Architecture

## AC-ARCH-01

File:

```text
routes/web.php
```

tidak boleh memiliki pola:

```php
Route::get('/...', function () {
    return view(...);
});
```

untuk halaman aplikasi.

Seluruh route halaman harus didelegasikan ke:

```text
PageController
```

---

# 47. Acceptance Criteria — Calculator

## AC-CALC-01

Input:

```text
/hitung/10/5/tambah
```

Output:

```text
15
```

---

## AC-CALC-02

Input:

```text
/hitung/10/5/kurang
```

Output:

```text
5
```

---

## AC-CALC-03

Input:

```text
/hitung/10/5/kali
```

Output:

```text
50
```

---

## AC-CALC-04

Input:

```text
/hitung/10/5/bagi
```

Output:

```text
2
```

---

## AC-CALC-05

Input:

```text
/hitung/10/0/bagi
```

Expected:

```text
Aplikasi tidak crash.
```

---

## AC-CALC-06

Input:

```text
/hitung/10/5/random
```

Expected:

```text
Operasi ditolak dengan aman.
```

---

# 48. Acceptance Criteria — Navbar

Navbar harus menampilkan:

```text
Home
About
Project
Kalkulator
```

Semua item dapat diklik.

Expected mapping:

```text
Home        → /
About       → /about
Project     → /project-idea
Kalkulator  → /calculator
```

---

# 49. Acceptance Criteria — UI

## AC-UI-01

Desktop:

```text
1366 × 768
```

Expected:

- Tidak ada horizontal overflow.
- Content center.
- Navbar terlihat normal.
- Spacing konsisten.
- Card tidak terlalu lebar.

---

## AC-UI-02

Mobile:

```text
360 × 800
```

Expected:

- Navbar collapse.
- Tidak ada horizontal overflow.
- Cards stack vertikal.
- Form dapat digunakan.
- Text tidak keluar layar.
- Button mudah ditekan.

---

# 50. Test Cases

| ID | Test | URL / Input | Expected Result |
|---|---|---|---|
| TC-01 | Home | `/` | Home tampil |
| TC-02 | Identity | `/` | Nama + NRP tampil |
| TC-03 | About | `/about` | Profil jurusan tampil |
| TC-04 | Project | `/project-idea` | Agentic AI idea tampil |
| TC-05 | Calculator page | `/calculator` | Form kalkulator tampil |
| TC-06 | Tambah | `/hitung/10/5/tambah` | `15` |
| TC-07 | Kurang | `/hitung/10/5/kurang` | `5` |
| TC-08 | Kali | `/hitung/10/5/kali` | `50` |
| TC-09 | Bagi | `/hitung/10/5/bagi` | `2` |
| TC-10 | Divide zero | `/hitung/10/0/bagi` | Error terkontrol |
| TC-11 | Invalid op | `/hitung/10/5/pangkat` | Error terkontrol |
| TC-12 | Invalid value | `/hitung/abc/5/tambah` | Error terkontrol |
| TC-13 | Navigation | Klik seluruh navbar | Semua route benar |
| TC-14 | Mobile | viewport 360px | Responsive |
| TC-15 | Desktop | viewport 1366px | Responsive |
| TC-16 | Controller | cek `web.php` | Semua page route memakai controller |
| TC-17 | Blade | inspect files | Tidak ada kalkulasi utama di Blade |

---

# 51. Development Plan

## Phase 1 — Laravel Setup

Checklist:

```text
[ ] Laravel berhasil dibuat
[ ] composer install berhasil
[ ] .env tersedia
[ ] APP_KEY tersedia
[ ] php artisan serve berhasil
```

---

## Phase 2 — Routing

Buat:

```text
/
 /about
/project-idea
/calculator
/hitung/{angka1}/{angka2}/{operasi}
```

Checklist:

```text
[ ] Semua route memakai PageController
[ ] Tidak ada Closure untuk render halaman
[ ] Route memiliki nama
```

---

## Phase 3 — Controller

Buat:

```text
PageController
```

Methods:

```text
index
about
project
calculator
hitung
```

Checklist:

```text
[ ] Data Home dikirim dari controller
[ ] About bekerja
[ ] Project bekerja
[ ] Calculator page bekerja
[ ] Perhitungan dilakukan di controller
```

---

## Phase 4 — Blade

Buat:

```text
layouts/app.blade.php
home.blade.php
about.blade.php
project.blade.php
calculator.blade.php
calculator-result.blade.php
```

Checklist:

```text
[ ] Layout reusable
[ ] Navbar reusable
[ ] Bootstrap hanya di-load melalui layout
[ ] Footer reusable
```

---

## Phase 5 — UI

Checklist:

```text
[ ] Bootstrap 5 CDN
[ ] Navbar
[ ] Active state
[ ] Mobile navbar
[ ] Clean cards
[ ] Typography hierarchy
[ ] Consistent spacing
[ ] Responsive content
```

---

## Phase 6 — Calculator

Checklist:

```text
[ ] Tambah
[ ] Kurang
[ ] Kali
[ ] Bagi
[ ] Divide by zero
[ ] Invalid operation
[ ] Numeric validation
[ ] Result page
```

---

## Phase 7 — QA

Checklist:

```text
[ ] Home tested
[ ] About tested
[ ] Project tested
[ ] Calculator tested
[ ] Mobile tested
[ ] Laptop tested
[ ] Navbar tested
[ ] Broken link checked
[ ] PHP error checked
```

---

## Phase 8 — Git & GitHub

Checklist:

```text
[ ] git init
[ ] .gitignore benar
[ ] .env tidak masuk repository
[ ] Commit source code
[ ] README tersedia
[ ] Push ke GitHub
```

---

# 52. Git Commit Recommendation

Contoh commit history:

```text
chore: initialize Laravel project

feat: add page controller and application routes

feat: create shared blade layout

feat: implement home page

feat: implement about page

feat: implement project idea page

feat: implement dynamic calculator

style: add bootstrap responsive interface

fix: handle invalid calculator operations

docs: add project README
```

---

# 53. README Requirements

`README.md` minimal berisi:

```text
# ITS Academic Profile

## About

## Requirements

## Installation

## Running Project

## Available Routes

## Project Structure

## Calculator Usage

## Student Information

## Screenshots

## Repository
```

---

# 54. README Installation Flow

Contoh:

```bash
git clone <repository-url>

cd <project-directory>

composer install

cp .env.example .env

php artisan key:generate

php artisan serve
```

Lalu:

```text
http://127.0.0.1:8000
```

---

# 55. Deliverables

Output akhir project:

```text
Laravel Project
│
├── routes/web.php
├── PageController.php
├── Blade Views
├── Bootstrap Responsive UI
├── Dynamic Calculator
├── README.md
└── GitHub Repository
```

---

# 56. Definition of Done

Project dianggap selesai apabila seluruh kondisi berikut terpenuhi:

```text
[ ] Laravel dapat dijalankan
[ ] Route / tersedia
[ ] Route /about tersedia
[ ] Route /project-idea tersedia
[ ] Route /hitung/{angka1}/{angka2}/{operasi} tersedia
[ ] Home menggunakan PageController@index
[ ] About menggunakan PageController@about
[ ] Project menggunakan PageController@project
[ ] Kalkulator diproses melalui controller
[ ] Tidak menggunakan Closure untuk render view
[ ] home.blade.php tersedia
[ ] about.blade.php tersedia
[ ] project.blade.php tersedia
[ ] Nama Lengkap tampil
[ ] NRP tampil
[ ] Profil Departemen Teknik Informatika ITS tampil
[ ] Ide Agentic AI tampil
[ ] Operasi tambah berjalan
[ ] Operasi kurang berjalan
[ ] Operasi kali berjalan
[ ] Operasi bagi berjalan
[ ] Pembagian nol tidak menyebabkan aplikasi crash
[ ] Navbar tersedia
[ ] Navbar Home berfungsi
[ ] Navbar About berfungsi
[ ] Navbar Project berfungsi
[ ] Navbar Kalkulator berfungsi
[ ] Bootstrap 5 CDN terintegrasi
[ ] Tampilan clean
[ ] Tampilan responsive di handphone
[ ] Tampilan responsive di laptop
[ ] Tidak ada horizontal scroll yang tidak diperlukan
[ ] Tidak ada broken navigation
[ ] Tidak ada fatal error
[ ] Source code rapi
[ ] README tersedia
[ ] Repository siap dipush ke GitHub
```

---

# 57. Demo Scenario

Urutan demo yang direkomendasikan:

```text
1. Jalankan:
   php artisan serve

2. Buka:
   /

3. Tunjukkan:
   Nama Lengkap
   NRP
   Home UI

4. Buka:
   routes/web.php

5. Jelaskan:
   Route → PageController

6. Buka:
   PageController.php

7. Jelaskan:
   index()
   about()
   project()

8. Kembali ke browser.

9. Buka:
   /about

10. Buka:
    /project-idea

11. Buka:
    /calculator

12. Test:
    10 × 5

13. Pastikan browser menuju:
    /hitung/10/5/kali

14. Tunjukkan:
    Hasil = 50

15. Test operasi lain.

16. Test:
    /hitung/10/0/bagi

17. Tunjukkan:
    error handling.

18. Aktifkan mobile responsive mode.

19. Tunjukkan navbar collapse.

20. Tunjukkan repository GitHub.
```

---

# 58. Presentation Talking Points

Saat menjelaskan aplikasi, alur utama dapat dipresentasikan sebagai:

```text
Ketika user membuka sebuah URL,
Laravel akan memeriksa routes/web.php.

Route tersebut kemudian memanggil
method pada PageController.

PageController mempersiapkan data atau
menjalankan logic yang diperlukan.

Controller kemudian mengirim data
ke Blade View.

Blade View bertanggung jawab
menampilkan interface ke user.
```

Untuk kalkulator:

```text
URL:
    /hitung/10/5/kali

↓ Route

PageController@hitung

↓ Parameter

angka1 = 10
angka2 = 5
operasi = kali

↓ Logic Controller

10 * 5

↓ Result

50

↓ Blade

"Hasil dari 10 kali 5 adalah 50"
```

---

# 59. Requirement Traceability

| Requirement dari Tugas | Implementasi PRD |
|---|---|
| Setup Laravel lokal | Laravel project setup |
| URL → Router → Controller → Blade | Laravel architecture |
| Git/GitHub | Development Phase 8 |
| Sistem Profil Mahasiswa | Home |
| Biodata | Home |
| Data akademik pribadi | Home |
| Ide Agentic AI | Project Idea |
| `GET /` | Home |
| `PageController@index` | Home Controller |
| `home.blade.php` | Home View |
| Nama Lengkap & NRP | Home Content |
| `GET /about` | About |
| `PageController@about` | About Controller |
| `about.blade.php` | About View |
| Profil Teknik Informatika ITS | About Content |
| `GET /project-idea` | Project |
| `PageController@project` | Project Controller |
| `project.blade.php` | Project View |
| Dilarang Closure | Routing Architecture |
| `/hitung/{angka1}/{angka2}/{operasi}` | Dynamic Calculator |
| Tambah | Calculator |
| Kurang | Calculator |
| Kali | Calculator |
| Bagi | Calculator |
| Dynamic result | Calculator Result |
| Bootstrap/Tailwind CDN | Bootstrap 5 CDN |
| Navbar | Global Layout |
| Home navbar | Navbar |
| About navbar | Navbar |
| Project navbar | Navbar |
| Kalkulator navbar | Navbar |
| Responsive handphone | Responsive Requirement |
| Responsive laptop | Responsive Requirement |

---

# 60. Important Implementation Rules

Rule berikut tidak boleh dilanggar:

```text
RULE-01
Framework harus Laravel.

RULE-02
Gunakan routes/web.php.

RULE-03
Seluruh route halaman harus menuju PageController.

RULE-04
Jangan gunakan Closure untuk langsung render view.

RULE-05
Gunakan Blade.

RULE-06
Home harus menampilkan Nama Lengkap dan NRP.

RULE-07
About harus menjelaskan Departemen Teknik Informatika ITS.

RULE-08
Project harus menjelaskan sub-tema Agentic AI.

RULE-09
Calculator harus menerima parameter melalui URL.

RULE-10
Calculator harus mendukung:
tambah
kurang
kali
bagi

RULE-11
Gunakan Bootstrap 5 via CDN.

RULE-12
Navbar harus tersedia.

RULE-13
Navbar harus menyediakan:
Home
About
Project
Kalkulator

RULE-14
UI harus responsive.

RULE-15
Website harus dapat digunakan baik dari handphone maupun laptop.
```

---

# 61. Recommended Implementation Rules

Bagian berikut merupakan peningkatan yang direkomendasikan PRD agar project lebih rapi, tetapi bukan requirement eksplisit pada PDF:

```text
REC-01
Gunakan layouts/app.blade.php sebagai shared layout.

REC-02
Tambahkan route /calculator sebagai UI input kalkulator.

REC-03
Gunakan named routes.

REC-04
Tambahkan active navbar state.

REC-05
Tangani division-by-zero.

REC-06
Tangani invalid operator.

REC-07
Validasi parameter numeric.

REC-08
Buat custom CSS seminimal mungkin.

REC-09
Gunakan reusable components bila memang dibutuhkan.

REC-10
Tambahkan README yang jelas.
```

---

# 62. Final Content Placeholder

Sebelum submission, data berikut wajib diganti.

```yaml
student:
  name: "ISI NAMA LENGKAP"
  nrp: "ISI NRP"
  bio: "ISI BIODATA"

department:
  summary: "ISI PROFIL SINGKAT DEPARTEMEN"

project:
  title: "ISI NAMA PROJECT"
  theme: "Agentic AI"
  problem: "ISI PERMASALAHAN"
  target_user: "ISI TARGET USER"
  solution: "ISI SOLUSI"
  features:
    - "ISI FEATURE 1"
    - "ISI FEATURE 2"
    - "ISI FEATURE 3"
```

---

# 63. Final Expected Result

Aplikasi akhir harus memiliki pengalaman seperti berikut:

```text
User membuka website
        ↓
Melihat ITS Academic Profile
        ↓
Melihat nama + NRP
        ↓
Menggunakan navbar yang clean
        ↓
Membuka About
        ↓
Melihat profil jurusan
        ↓
Membuka Project
        ↓
Melihat ide Agentic AI
        ↓
Membuka Calculator
        ↓
Memasukkan angka
        ↓
Perhitungan diproses PageController
        ↓
Hasil ditampilkan melalui Blade
        ↓
Semua tetap nyaman di mobile dan laptop
```

---

# 64. Final Success Criteria

Project dinyatakan **siap dikumpulkan dan siap didemokan** apabila:

```text
✓ Menggunakan Laravel

✓ Memahami dan menerapkan:
  URL
   ↓
  Route
   ↓
  Controller
   ↓
  Blade

✓ Semua route utama berjalan

✓ Tidak ada Closure untuk render halaman

✓ Home menampilkan Nama Lengkap + NRP

✓ About berisi profil Teknik Informatika ITS

✓ Project berisi ide Agentic AI

✓ Dynamic Calculator berjalan

✓ Tambah berjalan

✓ Kurang berjalan

✓ Kali berjalan

✓ Bagi berjalan

✓ Navbar berjalan

✓ Bootstrap 5 terintegrasi

✓ UI clean

✓ Responsive di handphone

✓ Responsive di laptop

✓ Tidak ada broken link

✓ Tidak ada fatal error

✓ Source code rapi

✓ Siap dipush ke GitHub

✓ Siap dipresentasikan
```

---

# 65. Implementation Priority

Urutan prioritas apabila waktu pengerjaan terbatas:

```text
P0 — WAJIB

1. Laravel berjalan
2. PageController
3. GET /
4. GET /about
5. GET /project-idea
6. Blade Views
7. Tidak menggunakan Closure
8. Nama + NRP
9. Profil Departemen
10. Project Agentic AI


P1 — CHALLENGE

11. /hitung/{angka1}/{angka2}/{operasi}
12. tambah
13. kurang
14. kali
15. bagi
16. hasil dinamis


P2 — UI

17. Bootstrap 5 CDN
18. Navbar
19. Clean design
20. Mobile responsive
21. Laptop responsive


P3 — POLISH

22. /calculator UI
23. Error handling
24. Active navigation
25. Shared layout
26. README
27. QA
```

---

# 66. Final Architecture

```text
                         USER
                           │
                           │ Request
                           ▼
                  ┌─────────────────┐
                  │      URL        │
                  └────────┬────────┘
                           │
                           ▼
                  ┌─────────────────┐
                  │ routes/web.php  │
                  └────────┬────────┘
                           │
                           │ Controller Route
                           ▼
               ┌──────────────────────┐
               │    PageController    │
               │                      │
               │ index()              │
               │ about()              │
               │ project()            │
               │ calculator()         │
               │ hitung()             │
               └──────────┬───────────┘
                          │
                          │ Data
                          ▼
               ┌──────────────────────┐
               │      Blade View      │
               │                      │
               │ home                 │
               │ about                │
               │ project              │
               │ calculator           │
               │ calculator-result    │
               └──────────┬───────────┘
                          │
                          ▼
               ┌──────────────────────┐
               │ Bootstrap 5 + CSS    │
               └──────────┬───────────┘
                          │
                          ▼
               ┌──────────────────────┐
               │ Responsive Browser   │
               │                      │
               │ Mobile / Laptop      │
               └──────────────────────┘
```

---

# 67. Conclusion

**ITS Academic Profile** akan dibangun sebagai aplikasi Laravel sederhana tetapi memiliki struktur yang benar dan dapat menunjukkan fundamental framework secara jelas.

Fokus utama implementasi adalah:

```text
Laravel
+
PageController
+
Blade
+
Routing yang benar
+
Profil Mahasiswa
+
Profil Jurusan
+
Project Agentic AI
+
Dynamic Calculator
+
Bootstrap 5
+
Clean Responsive UI
```

Implementasi tidak perlu dibuat terlalu kompleks. Prioritasnya adalah:

```text
rapi
+
jelas
+
responsif
+
mudah dipresentasikan
+
seluruh fitur berjalan
+
sesuai requirement tugas
```

Dengan PRD ini, hasil akhir yang ditargetkan bukan sekadar website yang terlihat bagus, tetapi aplikasi Laravel yang struktur routing, controller, Blade View, fitur kalkulator, navigasi, dan responsivitasnya dapat diperiksa dan didemokan dengan jelas sesuai spesifikasi tugas.
