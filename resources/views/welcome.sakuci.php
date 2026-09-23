@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Hero & Dashboard Section -->
<section class="py-4 my-2">
    <div class="container">
        
        <!-- CARD BESAR: Pengenalan Web / Hero Utama -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 bg-primary text-white shadow-sm rounded-4 p-4 p-lg-5 position-relative overflow-hidden">
                    
                    <!-- Dekorasi Background Icon Transparan -->
                    <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 pe-none" style="font-size: 18rem; margin-right: -4rem;">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="row align-items-center position-relative z-1">
                        <div class="col-lg-8">
                            <span class="badge bg-white text-primary px-3 py-1.5 rounded-pill fw-semibold small mb-3 shadow-sm">
                                <i class="bi bi-stars me-1"></i> InventarisHub v1.0.0
                            </span>
                            <h1 class="display-6 fw-bold mb-3 text-white">
                                Sistem Peminjaman Alat Cerdas & Terintegrasi
                            </h1>
                            <p class="text-white-50 lead fs-6 mb-4" style="max-width: 600px;">
                                Selamat datang di pusat pengelolaan aset kantor dan laboratorium. Optimalkan sirkulasi barang, pantau status secara real-time, dan ajukan peminjaman dengan lebih cepat dan transparan.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="#" class="btn btn-light text-primary fw-semibold px-4 py-2 rounded-pill shadow-sm">
                                    <i class="bi bi-plus-circle me-2"></i>Mulai Peminjaman
                                </a>
                                <a href="#" class="btn btn-outline-light fw-semibold px-4 py-2 rounded-pill">
                                    Pelajari Fitur
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- BARIS KEDUA: Quick Stats / Statistik Ringkas -->
        <div class="row g-4 mb-4">
            
            <!-- Statistik 1 -->
            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Kondisi Aset</span>
                            <div class="bg-success-subtle text-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-check-lg"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">98.5%</h2>
                        <p class="text-muted small mb-3">Seluruh perangkat inventaris berfungsi optimal.</p>
                    </div>
                    <div class="progress" style="height: 6px; border-radius: 10px;">
                        <div class="progress-bar bg-success" style="width: 98.5%"></div>
                    </div>
                </div>
            </div>

            <!-- Statistik 2 -->
            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Kecepatan Respon</span>
                            <div class="bg-primary-subtle text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">&lt; 10 Menit</h2>
                        <p class="text-muted small mb-0">Rata-rata waktu persetujuan dari petugas.</p>
                    </div>
                    <div class="mt-3 pt-2 border-top small text-muted">
                        <i class="bi bi-shield-check text-primary me-1"></i> Sistem verifikasi otomatis aktif
                    </div>
                </div>
            </div>

            <!-- Statistik 3 -->
            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-bold text-uppercase">Notifikasi Aktif</span>
                            <div class="bg-warning-subtle text-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-bell"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-body mb-1">Aman</h2>
                        <p class="text-muted small mb-0">Tidak ada jadwal pengembalian yang terlambat.</p>
                    </div>
                    <div class="mt-3 pt-2 border-top small text-muted">
                        <i class="bi bi-clock-history me-1"></i> Pembaruan secara real-time
                    </div>
                </div>
            </div>

        </div>

        <!-- BARIS KETIGA: 3 Fitur Pendukung -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary-subtle text-primary rounded-3 p-3 fs-4">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-body mb-1">Pencatatan Aman</h6>
                            <p class="text-muted small mb-0">Verifikasi digital tervalidasi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success-subtle text-success rounded-3 p-3 fs-4">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-body mb-1">Proses Kilat</h6>
                            <p class="text-muted small mb-0">Tanpa birokrasi yang rumit.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border bg-body shadow-sm rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning-subtle text-warning rounded-3 p-3 fs-4">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-body mb-1">Pengingat Otomatis</h6>
                            <p class="text-muted small mb-0">Notifikasi tenggat waktu tepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection