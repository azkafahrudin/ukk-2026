@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Custom CSS tambahan khusus untuk efek bento yang adaptif -->
<style>
    .bento-card {
        border: 1px solid var(--bs-border-color-translucent);
        border-radius: 1.5rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .bento-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15)!important;
    }
    .bento-brand-bg {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
        color: white !important;
        border: none !important;
    }
</style>

<!-- Hero Section: Bento Grid Style -->
<section class="py-5 my-3">
    <div class="container">
        
        <!-- Baris Atas: Grid Utama -->
        <div class="row g-4">
            
            <!-- Kotak Besar Kiri (Hero Utama) -->
            <div class="col-lg-8">
                <div class="card bento-card bento-brand-bg p-4 p-lg-5 h-100 d-flex flex-column justify-content-between position-relative overflow-hidden shadow-sm">
                    <!-- Efek Dekoratif Lingkaran di Background -->
                    <div class="position-absolute top-0 end-0 translate-middle-y opacity-10" style="font-size: 15rem; margin-right: -4rem;">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="mb-4">
                        <span class="badge bg-white text-primary rounded-pill px-3 py-2 fw-semibold mb-3 shadow-sm">
                            <i class="bi bi-layers-fill me-1"></i> InventarisHub v1.0.0
                        </span>
                        <h1 class="display-5 fw-bold text-white mb-3">
                            Sistem Peminjaman Alat Cerdas & Terintegrasi
                        </h1>
                        <p class="text-white-50 lead mb-0" style="max-width: 550px;">
                            Optimalisasi pengelolaan aset dan inventaris kantor atau lab dengan pelacakan real-time yang akurat.
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-light text-primary fw-semibold px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i> Ajukan Pinjaman
                        </a>
                        <a href="#" class="btn btn-outline-light px-4 py-2 rounded-pill">
                            <i class="bi bi-journal-text me-1"></i> Panduan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kotak Kanan Atas: Quick Stats -->
            <div class="col-lg-4">
                <div class="card bento-card p-4 h-100 d-flex flex-column justify-content-between shadow-sm bg-body">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="text-muted fw-bold mb-0">STATUS ASET</h6>
                            <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1">Live</span>
                        </div>
                        <h2 class="fw-bold display-6 mb-1">98%</h2>
                        <p class="text-muted small">Total alat dalam kondisi prima dan siap dipinjam.</p>
                    </div>

                    <div class="p-3 rounded-4 mt-3 bg-body-secondary border">
                        <div class="d-flex align-items-center justify-content-between fw-semibold small">
                            <span><i class="bi bi-clock-history me-2 text-primary"></i> Rata-rata Approval</span>
                            <span class="text-primary"> &lt; 10 Menit</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Baris Bawah: Kotak-kotak Kecil Pendukung -->
        <div class="row g-4 mt-1">
            
            <!-- Kotak Fitur 1 -->
            <div class="col-md-4">
                <div class="card bento-card p-4 h-100 shadow-sm bg-body">
                    <div class="icon-box bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 fs-4 mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pencatatan Aman</h5>
                    <p class="text-muted small mb-0">Setiap transaksi peminjaman tercatat rapi dengan sistem verifikasi digital yang valid.</p>
                </div>
            </div>

            <!-- Kotak Fitur 2 -->
            <div class="col-md-4">
                <div class="card bento-card p-4 h-100 shadow-sm bg-body">
                    <div class="icon-box bg-success-subtle text-success rounded-4 d-inline-flex p-3 fs-4 mb-3">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Proses Kilat</h5>
                    <p class="text-muted small mb-0">Tanpa birokrasi rumit, cukup pilih alat, ajukan tanggal, dan tunggu konfirmasi admin.</p>
                </div>
            </div>

            <!-- Kotak Fitur 3 -->
            <div class="col-md-4">
                <div class="card bento-card p-4 h-100 shadow-sm bg-body">
                    <div class="icon-box bg-warning-subtle text-warning rounded-4 d-inline-flex p-3 fs-4 mb-3">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pengingat Otomatis</h5>
                    <p class="text-muted small mb-0">Dapatkan notifikasi langsung saat batas waktu pengembalian alat hampir tiba.</p>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection