<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/project-idea', [PageController::class, 'project'])->name('project');
Route::get('/kalkulator', [PageController::class, 'kalkulator'])->name('kalkulator');

Route::get('/anggota/{nrp}', [PageController::class, 'anggotaProfile'])
    ->whereNumber('nrp')
    ->name('anggota.show');

Route::get('/hitung/{angka1}/{angka2}/{operasi}', [PageController::class, 'hitung'])
    ->where([
        'angka1' => '[0-9]+(\.[0-9]+)?',
        'angka2' => '[0-9]+(\.[0-9]+)?',
        'operasi' => 'tambah|kurang|kali|bagi',
    ])
    ->name('hitung');
