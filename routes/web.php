<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - ITS Academic Profile (Kelompok 7 PBKK B)
|--------------------------------------------------------------------------
|
| Seluruh rute aplikasi ditangani secara eksklusif oleh PageController.
| Tidak diperbolehkan menggunakan Closure untuk rendering view sesuai
| spesifikasi PRD (RULE-03, RULE-04, AC-ARCH-01).
|
*/

// Halaman Beranda (Home) - Menampilkan identitas mahasiswa & anggota kelompok
Route::get('/', [PageController::class, 'index'])->name('home');

// Halaman About - Profil Departemen Teknik Informatika ITS
Route::get('/about', [PageController::class, 'about'])->name('about');

// Halaman Project Idea - Rancangan proyek Agentic AI Kelompok 7
Route::get('/project-idea', [PageController::class, 'project'])->name('project');

// Halaman Form Kalkulator - UI interaktif kalkulator (mendukung /calculator dan /kalkulator)
Route::get('/calculator', [PageController::class, 'calculator'])->name('calculator');
Route::get('/kalkulator', [PageController::class, 'calculator'])->name('kalkulator');

// Route Challenge - Kalkulator dinamis berbasis parameter URL
Route::get('/hitung/{angka1}/{angka2}/{operasi}', [PageController::class, 'hitung'])->name('hitung');
