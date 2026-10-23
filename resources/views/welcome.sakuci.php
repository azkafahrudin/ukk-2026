@extends('layouts.app')

@section('title', config('app.name') . ' — Sistem Peminjaman Alat Cerdas & Terintegrasi')

@section('content')
<!-- Font & Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    /* Global Landing Base */
    .inventaris-landing {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Custom Color Palette */
    :root {
        --yellow-primary: #FFD700;
        --yellow-hover: #FFC107;
        --yellow-dark: #B8860B;
        --yellow-glow: rgba(255, 215, 0, 0.35);
        --yellow-subtle: rgba(255, 215, 0, 0.12);
    }

    /* Hero Banner with Modern Grid Pattern */
    .hero-banner {
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 50%, #FFB300 100%);
        border-radius: 2.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px -15px rgba(255, 193, 7, 0.4);
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: radial-gradient(#000000 1px, transparent 1px);
        background-size: 24px 24px;
        opacity: 0.06;
        pointer-events: none;
    }

    /* Cards Styling */
    .glass-card {
        background: var(--bs-body-bg);
        border: 1px solid var(--bs-border-color);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    
    .glass-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 1rem 2.5rem var(--yellow-glow) !important;
        border-color: var(--yellow-hover);
    }

    .glass-card-yellow {
        background: linear-gradient(145deg, rgba(255, 215, 0, 0.15) 0%, rgba(255, 193, 7, 0.05) 100%);
        border: 1px solid rgba(255, 215, 0, 0.3);
    }

    /* Icon Box Base */
    .feature-icon-box {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 1.25rem;
        transition: all 0.3s ease;
    }

    .glass-card:hover .feature-icon-box {
        transform: scale(1.1) rotate(-3deg);
        background-color: #FFD700 !important;
        color: #000000 !important;
    }

    /* Custom Utility Buttons & Badges */
    .text-yellow-custom {
        color: var(--yellow-dark) !important;
    }
    
    .bg-yellow-subtle {
        background-color: var(--yellow-subtle) !important;
    }

    .btn-yellow-primary {
        background-color: var(--yellow-primary);
        color: #1a1a1a;
        border: none;
        box-shadow: 0 4px 12px var(--yellow-glow);
    }

    .btn-yellow-primary:hover {
        background-color: var(--yellow-hover);
        color: #000000;
        transform: translateY(-2px);
    }

    .badge-yellow {
        background-color: #FFD700;
        color: #000000;
        font-weight: 700;
    }

    /* Floating Decorative Shapes */
    .floating-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
    }

    /* Connector Line for Workflow */
    .step-connector {
        position: relative;
    }

    @media (min-width: 768px) {
        .step-connector::after {
            content: '';
            position: absolute;
            top: 30px;
            right: -25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, #FFD700 0%, var(--bs-border-color) 100%);
            z-index: 1;
        }
        .step-connector-last::after {
            display: none;
        }
    }
</style>

<div class="inventaris-landing py-4">
    <div class="container">
        
        <!-- ========================================== -->
        <!-- 1. HERO SECTION UTAMA (INTERACTIVE GRID)   -->
        <!-- ========================================== -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="hero-banner text-dark p-4 p-md-5 p-lg-6 position-relative">
                    
                    <!-- Decorative Floating Elements -->
                    <div class="floating-circle d-none d-md-block" style="width: 120px; height: 120px; top: -30px; right: 10%;"></div>
                    <div class="floating-circle d-none d-md-block" style="width: 60px; height: 60px; bottom: 20px; right: 30%; animation-delay: 2s;"></div>

                    <div class="row align-items-center position-relative z-2">
                        <!-- Left Hero Content -->
                        <div class="col-lg-7 py-3">
                            <div class="d-inline-flex align-items-center gap-2 bg-dark text-warning px-3 py-2 rounded-pill fw-bold small mb-4 shadow-sm">
                                <span class="spinner-grow spinner-grow-sm text-warning" role="status"></span>
                                <span><i class="bi bi-lightning-charge-fill me-1"></i> InventarisHub v1.0 — Ecosystem Live</span>
                            </div>
                            
                            <h1 class="display-4 fw-black mb-4 lh-sm text-dark tracking-tight">
                                Sistem Peminjaman Alat Laboratorium <span class="bg-dark text-warning px-2 rounded-3 d-inline-block">Cerdas & Real-Time</span>
                            </h1>
                            
                            <p class="lead text-dark mb-4 fs-6 fw-medium" style="max-width: 620px; line-height: 1.8; opacity: 0.9;">
                                Kelola, lacak, dan pinjam aset laboratorium sekolah tanpa ribet. Dilengkapi pencatatan otomatis, verifikasi kilat, dan transparansi stok penuh.
                            </p>
                            
                            <!-- Search & Quick CTA -->
                            <div class="d-flex flex-wrap align-items-center gap-3">
                                <a href="{{ route('login') }}" class="btn btn-dark text-warning fw-bold px-5 py-3 rounded-pill shadow-lg d-inline-flex align-items-center fs-6">
                                    <i class="bi bi-box-arrow-in-right me-2 fs-5"></i> Masuk & Pinjam
                                </a>
                                <a href="#katalog" class="btn btn-outline-dark fw-bold px-4 py-3 rounded-pill d-inline-flex align-items-center fs-6">
                                    <i class="bi bi-grid-fill me-2"></i> Lihat Katalog Unit
                                </a>
                            </div>

                            <!-- Trust Badges -->
                            <div class="d-flex align-items-center gap-4 mt-5 pt-3 border-top border-dark border-opacity-10 text-dark small fw-semibold">
                                <div><i class="bi bi-shield-check fs-5 me-1 align-middle"></i> Terverifikasi Sistem</div>
                                <div><i class="bi bi-clock-history fs-5 me-1 align-middle"></i> Bebas Antrean Manual</div>
                                <div><i class="bi bi-qr-code-scan fs-5 me-1 align-middle"></i> QR Scan Ready</div>
                            </div>
                        </div>

                        <!-- Right Interactive Live Widget Preview -->
                        <div class="col-lg-5 mt-4 mt-lg-0">
                            <div class="bg-dark text-white p-4 rounded-4 shadow-lg border border-warning border-opacity-20 position-relative">
                                <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="bi bi-cpu-fill text-dark fs-6"></i>
                                        </div>
                                        <span class="fw-bold fs-6">Status Sistem Lab</span>
                                    </div>
                                    <span class="badge bg-success text-white px-2 py-1 rounded-pill small"><i class="bi bi-circle-fill fs-6 me-1" style="font-size: 8px;"></i> Online</span>
                                </div>

                                <!-- Mini Status Items -->
                                <div class="d-flex flex-column gap-3">
                                    <div class="p-3 rounded-3 bg-secondary bg-opacity-20 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-laptop fs-3 text-warning"></i>
                                            <div>
                                                <div class="fw-bold small">Laptop & PC Unit</div>
                                                <div class="text-muted extra-small" style="font-size: 0.75rem;">Lab Komputer 1 - 3</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-yellow">Tersedia</span>
                                    </div>

                                    <div class="p-3 rounded-3 bg-secondary bg-opacity-20 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-projector fs-3 text-warning"></i>
                                            <div>
                                                <div class="fw-bold small">Proyektor & Sound System</div>
                                                <div class="text-muted extra-small" style="font-size: 0.75rem;">Ruang Ruang Kategori</div>
                                            </div>
                                        </div>
                                        <span class="badge bg-info text-dark fw-bold">Siap Pakai</span>
                                    </div>

                                    <div class="p-3 rounded-3 bg-secondary bg-opacity-20 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-tools fs-3 text-warning"></i>
                                            <div>
                                                <div class="fw-bold small">Kit Perbaikan & Toolkit</div>
                                                <div class="text-muted extra-small" style="font-size: 0.75rem;">Ruang Inventaris</div>
                                            </div>
                                        </div>
                                        <span class="badge bg-warning text-dark fw-bold">Terbatas</span>
                                    </div>
                                </div>

                                <!-- Footer Widget -->
                                <div class="mt-4 pt-3 text-center border-top border-secondary">
                                    <small class="text-muted">Proses Pengajuan Rata-Rata: <strong class="text-warning">&lt; 10 Menit</strong></small>
                                </div>
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
        <!-- 2. LIVE STATISTIK COUNTER (HIGHLITED GRID) -->
        <!-- ========================================== -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 border-start border-4 border-warning">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted small fw-bold text-uppercase tracking-wider">Total Unit Aset</span>
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom">
                            <i class="bi bi-boxes fs-3"></i>
                        </div>
                    </div>
                    <h2 class="display-6 fw-black text-body mb-1">{{ $totalAlat }} <span class="fs-6 fw-semibold text-muted">Item Terdaftar</span></h2>
                    <p class="text-muted small mb-0">Seluruh perangkat lab terekam dalam database terpusat.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 border-start border-4 border-warning">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted small fw-bold text-uppercase tracking-wider">Kategori Fasilitas</span>
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom">
                            <i class="bi bi-grid-1x2-fill fs-3"></i>
                        </div>
                    </div>
                    <h2 class="display-6 fw-black text-body mb-1">{{ $jumlahKategori }} <span class="fs-6 fw-semibold text-muted">Kelompok</span></h2>
                    <p class="text-muted small mb-0">Terklasifikasi rapi untuk mempermudah pencarian.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card shadow-sm rounded-4 p-4 h-100 border-start border-4 border-warning">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted small fw-bold text-uppercase tracking-wider">Layanan Peminjaman</span>
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom">
                            <i class="bi bi-lightning-charge-fill fs-3"></i>
                        </div>
                    </div>
                    <h2 class="display-6 fw-black text-body mb-1">Instant <span class="fs-6 fw-semibold text-muted">Approval</span></h2>
                    <p class="text-muted small mb-0">Prosedur verifikasi kilat langsung oleh petugas lab.</p>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 3. FEATURE HIGHLIGHTS (BENTO GRID STYLE)   -->
        <!-- ========================================== -->
        <div class="mb-5 py-3">
            <div class="text-center mx-auto mb-5" style="max-width: 650px;">
                <span class="badge bg-yellow-subtle text-yellow-custom fw-bold px-3 py-2 rounded-pill mb-2">KEUNGGULAN PLATFORM</span>
                <h2 class="fw-black display-6 text-body">Mengapa Menggunakan InventarisHub?</h2>
                <p class="text-muted small">Solusi modern menggantikan pencatatan buku besar yang rawan hilang dan tidak akurat.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="glass-card p-4 rounded-4 h-100">
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom mb-3">
                            <i class="bi bi-speedometer2 fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-body mb-2">Real-Time Tracking</h5>
                        <p class="text-muted small mb-0">Pantau ketersediaan stok barang secara langsung detik ini juga tanpa perlu ke ruang penyimpanan.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="glass-card p-4 rounded-4 h-100">
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom mb-3">
                            <i class="bi bi-shield-lock-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-body mb-2">Akses Berbasis Role</h5>
                        <p class="text-muted small mb-0">Sistem memisahkan hak akses secara ketat antara Peminjam, Petugas, dan Administrator.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="glass-card p-4 rounded-4 h-100">
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom mb-3">
                            <i class="bi bi-journal-check fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-body mb-2">Riwayat & Transparansi</h5>
                        <p class="text-muted small mb-0">Catatan pengembalian dan kondisi alat tercatat otomatis demi menjaga akuntabilitas aset.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="glass-card p-4 rounded-4 h-100">
                        <div class="feature-icon-box bg-yellow-subtle text-yellow-custom mb-3">
                            <i class="bi bi-bell-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-body mb-2">Pengingat Tenggat</h5>
                        <p class="text-muted small mb-0">Sistem membantu mengingatkan batas waktu pengembalian alat agar terhindar dari keterlambatan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 4. KATALOG KATEGORI (DYNAMIC FROM DB)      -->
        <!-- ========================================== -->
        <div id="katalog" class="mb-5 py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4">
                <div>
                    <span class="badge bg-yellow-subtle text-yellow-custom fw-bold px-3 py-2 rounded-pill mb-2">KATALOG UNIT</span>
                    <h2 class="fw-black display-6 text-body mb-0">Eksplorasi Kategori Perangkat</h2>
                </div>
                <p class="text-muted small mt-2 mt-md-0 mb-0">Pilih kategori untuk melihat unit yang siap dipinjam.</p>
            </div>

            <div class="row g-4">
                @forelse($kategoris as $kat)
                    <div class="col-sm-6 col-lg-4">
                        <div class="glass-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between border-top border-4 border-warning">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="feature-icon-box bg-yellow-subtle text-yellow-custom">
                                        <i class="bi bi-folder-symlink-fill fs-3"></i>
                                    </div>
                                    <span class="badge badge-yellow px-3 py-2 rounded-pill">Aktif</span>
                                </div>
                                <h4 class="fw-bold text-body mb-2">{{ $kat->nama_kategori }}</h4>
                                <p class="text-muted small mb-4" style="line-height: 1.6;">{{ $kat->keterangan ?? 'Fasilitas perangkat resmi yang dikelola secara terpusat untuk kegiatan operasional dan praktikum.' }}</p>
                            </div>
                            
                            <a href="{{ route('login') }}" class="btn btn-yellow-primary rounded-pill w-100 fw-bold py-2 d-flex align-items-center justify-content-center">
                                Pinjam Dari Kategori Ini <i class="bi bi-arrow-right-short fs-4 ms-1"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="glass-card p-5 d-inline-block rounded-4">
                            <i class="bi bi-folder-x text-warning display-3 mb-3 d-block"></i>
                            <h4 class="fw-bold text-body">Belum Ada Kategori</h4>
                            <p class="text-muted small mb-0">Silakan tambahkan data kategori melalui panel admin sistem.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 5. ALUR PEMINJAMAN (WORKFLOW CONNECTOR)    -->
        <!-- ========================================== -->
        <div class="mb-5 py-4">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <span class="badge bg-yellow-subtle text-yellow-custom fw-bold px-3 py-2 rounded-pill mb-2">WORKFLOW</span>
                <h2 class="fw-black display-6 text-body">3 Langkah Mudah Peminjaman</h2>
                <p class="text-muted small">Alur cepat dan fleksibel yang dirancang untuk efisiensi waktu kamu.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4 step-connector">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative z-2">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 48px; height: 48px;">1</span>
                            <h4 class="fw-bold text-body mb-0">Pilih Alat</h4>
                        </div>
                        <p class="text-muted small mb-0">Buka katalog, cari perangkat yang kamu butuhkan, dan atur jadwal durasi peminjaman.</p>
                    </div>
                </div>

                <div class="col-md-4 step-connector">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative z-2">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 48px; height: 48px;">2</span>
                            <h4 class="fw-bold text-body mb-0">Verifikasi</h4>
                        </div>
                        <p class="text-muted small mb-0">Pengajuan kamu otomatis diteruskan ke petugas lab untuk proses persetujuan cepat.</p>
                    </div>
                </div>

                <div class="col-md-4 step-connector-last">
                    <div class="glass-card p-4 rounded-4 h-100 position-relative z-2">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 48px; height: 48px;">3</span>
                            <h4 class="fw-bold text-body mb-0">Ambil Unit</h4>
                        </div>
                        <p class="text-muted small mb-0">Tunjukkan bukti peminjaman di loket inventaris dan ambil perangkat secara langsung.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 6. BOTTOM CTA BANNER                       -->
        <!-- ========================================== -->
        <div class="mb-4">
            <div class="glass-card-yellow rounded-4 p-5 text-center position-relative overflow-hidden">
                <div class="position-relative z-2 py-3 mx-auto" style="max-width: 650px;">
                    <i class="bi bi-box-seam-fill text-yellow-custom display-4 mb-3 d-block"></i>
                    <h2 class="fw-black display-6 text-body mb-3">Siap Menggunakan Perangkat Lab?</h2>
                    <p class="text-muted mb-4">Masuk ke akun kamu sekarang untuk mulai mengajukan peminjaman alat dengan mudah dan praktis.</p>
                    <a href="{{ route('login') }}" class="btn btn-yellow-primary fw-bold px-5 py-3 rounded-pill fs-6">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk ke Akun Sekarang
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection