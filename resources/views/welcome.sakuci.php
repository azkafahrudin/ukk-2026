@extends('layouts.app')

@section('title', config('app.name') . ' — Sistem Peminjaman Alat Cerdas & Terintegrasi')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Custom Styling untuk InventarisHub Landing Page */
    .inventaris-landing {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .hero-banner {
        background: linear-gradient(135deg, var(--bs-primary) 0%, #0043a8 100%);
        border-radius: 2rem;
        position: relative;
        overflow: hidden;
    }

    .glass-card {
        background: var(--bs-body-bg);
        border: 1px solid var(--bs-border-color);
        transition: all 0.3s ease;
    }
    
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.08) !important;
        border-color: var(--bs-primary);
    }

    .feature-icon-box {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 1rem;
    }
</style>

<div class="inventaris-landing py-4">
    <div class="container">
        
        <!-- ========================================== -->
        <!-- 1. HERO SECTION UTAMA                      -->
        <!-- ========================================== -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="hero-banner text-white p-4 p-lg-6 shadow-lg position-relative">
                    <!-- Background Watermark Icon -->
                    <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 pe-none d-none d-lg-block" style="font-size: 24rem; margin-right: -5rem; margin-top: 6rem;">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="row align-items-center position-relative z-1">
                        <div class="col-lg-8 py-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold small mb-4 shadow-sm">
                                <i class="bi bi-stars me-1"></i> InventarisHub Ecosystem v1.0
                            </span>
                            
                            <h1 class="display-5 fw-extrabold mb-4 lh-sm text-white">
                                Kelola & Pinjam Aset Laboratorium Lebih Cepat, Aman, dan Transparan.
                            </h1>
                            
                            <p class="lead text-white-50 mb-4 fs-6" style="max-width: 650px; line-height: 1.7;">
                                Platform digital terpusat untuk memantau ketersediaan perangkat kantor dan lab secara real-time. Hilangkan birokrasi manual dan optimalkan sirkulasi barang dengan sistem yang tervalidasi.
                            </p>
                            
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('login') }}" class="btn btn-light text-primary fw-bold px-5 py-3 rounded-pill shadow d-inline-flex align-items-center">
                                    <i class="bi bi-box-arrow-in-right me-2 fs-5"></i> Masuk ke Sistem
                                </a>
                                <a href="#katalog" class="btn btn-outline-light fw-semibold px-4 py-3 rounded-pill d-inline-flex align-items-center">
                                    <i class="bi bi-grid-fill me-2"></i> Jelajahi Katalog
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            // Ambil data dinamis dari database untuk statistik live
            $totalAlat = \App\Models\Alat::count();
            $kategoris = \App\Models\Kategori::all();
            $jumlahKategori = count($kategoris);
        @endphp

        <!-- ========================================== -->
        <!-- 2. LIVE STATISTICS COUNTERS                -->
        <!-- ========================================== -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Total Unit Aset</span>
                            <div class="feature-icon-box bg-primary-subtle text-primary">
                                <i class="bi bi-boxes fs-4"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">{{ $totalAlat }} <span class="fs-6 fw-normal text-muted">Item</span></h2>
                        <p class="text-muted small mb-0">Perangkat terdaftar dan siap digunakan.</p>
                    </div>
                    <div class="mt-3 pt-3 border-top small text-success fw-semibold">
                        <i class="bi bi-check-circle-fill me-1"></i> Data tersinkronisasi live
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Kategori Fasilitas</span>
                            <div class="feature-icon-box bg-success-subtle text-success">
                                <i class="bi bi-grid-1x2-fill fs-4"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">{{ $jumlahKategori }} <span class="fs-6 fw-normal text-muted">Kategori</span></h2>
                        <p class="text-muted small mb-0">Klasifikasi alat laboratorium & kantor.</p>
                    </div>
                    <div class="mt-3 pt-3 border-top small text-muted">
                        <i class="bi bi-shield-check text-success me-1"></i> Terstruktur rapi
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Kecepatan Verifikasi</span>
                            <div class="feature-icon-box bg-warning-subtle text-warning">
                                <i class="bi bi-lightning-charge-fill fs-4"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">&lt; 10 Menit</h2>
                        <p class="text-muted small mb-0">Rata-rata persetujuan dari petugas.</p>
                    </div>
                    <div class="mt-3 pt-3 border-top small text-muted">
                        <i class="bi bi-clock-history text-warning me-1"></i> Otomatis tanpa antre
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 3. KATALOG KATEGORI (Dynamic from DB)      -->
        <!-- ========================================== -->
        <div id="katalog" class="mb-5 py-3">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <span class="text-primary fw-bold small text-uppercase tracking-wider">KATEGORI PERANGKAT</span>
                <h2 class="fw-extrabold display-6 mt-1 mb-2">Pilih Berdasarkan Kebutuhan</h2>
                <p class="text-muted small">Temukan berbagai fasilitas penunjang kegiatan praktikum dan operasional dengan mudah.</p>
            </div>

            <div class="row g-4">
                @forelse($kategoris as $kat)
                    <div class="col-sm-6 col-lg-3">
                        <div class="glass-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="feature-icon-box bg-primary-subtle text-primary mb-3">
                                    <i class="bi bi-cpu fs-4"></i>
                                </div>
                                <h5 class="fw-bold text-body mb-2">{{ $kat->nama_kategori }}</h5>
                                <p class="text-muted small mb-4" style="line-height: 1.5;">{{ $kat->keterangan ?? 'Fasilitas perangkat resmi terstandarisasi.' }}</p>
                            </div>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary rounded-pill w-100 fw-semibold">
                                Pinjam Unit <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="glass-card p-5 d-inline-block rounded-4">
                            <i class="bi bi-folder-x text-muted fs-1 mb-3 d-block"></i>
                            <h5 class="fw-bold text-body">Belum Ada Kategori</h5>
                            <p class="text-muted small mb-0">Silakan tambahkan data kategori melalui panel admin sistem.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 4. ALUR PEMINJAMAN (WORKFLOW)              -->
        <!-- ========================================== -->
        <div class="mb-5 py-4">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <span class="text-primary fw-bold small text-uppercase tracking-wider">PROSEDUR MUDAH</span>
                <h2 class="fw-extrabold display-6 mt-1 mb-2">3 Langkah Peminjaman Kilat</h2>
                <p class="text-muted small">Alur birokrasi dipangkas agar proses peminjaman instan dan efisien.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative">
                        <span class="badge bg-primary text-white rounded-pill px-3 py-1 mb-3 fw-bold">Langkah 01</span>
                        <h4 class="fw-bold text-body mb-2">Masuk ke Akun</h4>
                        <p class="text-muted small mb-0">Login menggunakan kredensial terdaftar sesuai role Anda (peminjam atau petugas).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative">
                        <span class="badge bg-primary text-white rounded-pill px-3 py-1 mb-3 fw-bold">Langkah 02</span>
                        <h4 class="fw-bold text-body mb-2">Ajukan Perangkat</h4>
                        <p class="text-muted small mb-0">Pilih alat yang diinginkan dari katalog, tentukan durasi, lalu submit formulir pengajuan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative">
                        <span class="badge bg-primary text-white rounded-pill px-3 py-1 mb-3 fw-bold">Langkah 03</span>
                        <h4 class="fw-bold text-body mb-2">Ambil di Loket</h4>
                        <p class="text-muted small mb-0">Dapatkan verifikasi persetujuan instan dan ambil perangkat langsung di ruang inventaris.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection