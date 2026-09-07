# Sistem Informasi Statik Profil Mahasiswa — ITS Academic Profile

**Kelompok 7 — S1 Teknik Informatika, Institut Teknologi Sepuluh Nopember**

## Anggota Kelompok

- Mochammad Irfan Sandy
- Pradhipta Raja
- Himawan Rakha Bhadra
- M. Najib Bakhruddin
- Arya Rangga
- Hisyam Syafa

## Tentang Aplikasi

Web profil akademik sederhana yang dibangun sebagai Tugas Mandiri Laravel
Sandbox Pertama. Menyajikan data diri mahasiswa, gambaran singkat jurusan,
dan rancangan ide proyek berbasis Agentic AI yang akan dikembangkan lebih
lanjut di akhir semester. Ditambah satu fitur ekstra: kalkulator yang
prosesnya dihitung langsung oleh server.

## Alur Kerja Aplikasi

Setiap request masuk lewat `routes/web.php`, diteruskan ke `PageController`,
lalu dirender jadi tampilan HTML lewat Blade View. Tidak ada logika tampilan
yang ditulis langsung sebagai Closure di file rute — semuanya lewat controller.

```
Browser → routes/web.php → PageController → Blade View (resources/views)
```

## Daftar Halaman

| Rute | Fungsi |
|---|---|
| `/` | Beranda — identitas mahasiswa |
| `/about` | Profil Departemen Teknik Informatika ITS |
| `/project-idea` | Rancangan ide proyek Agentic AI |
| `/hitung/{angka1}/{angka2}/{operasi}` | Kalkulasi langsung lewat parameter URL |
| `/kalkulator` | Antarmuka kalkulator interaktif |

## Menjalankan Proyek

```bash
composer install
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

## Cara Pengujian

Setiap rute dicoba satu per satu lewat browser untuk memastikan tidak ada
error 404 dan konten tampil sesuai. Kalkulator diuji dengan berbagai
kombinasi angka serta kasus tepi seperti pembagian dengan nol.
