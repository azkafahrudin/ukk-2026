@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Admin')

@section('content')
<div class="container-fluid px-0 py-2">

    <!-- 🌟 BANNER UTAMA PREMIUM (Modern Dark Gradient with Glow) -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4 text-white position-relative premium-banner">
        <div class="banner-glow-1"></div>
        <div class="banner-glow-2"></div>
        <div class="card-body p-4 p-md-5 position-relative z-1">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 backdrop-blur rounded-pill px-3 py-1 mb-3 border border-white border-opacity-15">
                        <span class="badge bg-warning text-dark rounded-pill me-2 px-2 py-1 fw-bold fs-7">
                            <i class="bi bi-shield-fill-check"></i>
                        </span>
                        <span class="small fw-semibold text-white-50 tracking-wide">SECURE ADMIN CONSOLE</span>
                    </div>
                    <h1 class="fw-extrabold mb-2 display-6 tracking-tight text-white">
                        Halo, <span class="text-gradient-gold">{{ $user->username ?? 'Administrator' }}</span> 👋
                    </h1>
                    <p class="mb-0 text-white-50 fs-6 lh-relaxed" style="max-width: 620px;">
                        Pusat kendali inventaris sistem. Kelola hak akses, monitoring alat, verifikasi peminjaman, dan eksekusi keamanan data dalam satu panel terpadu.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-inline-flex align-items-center gap-3 bg-black bg-opacity-30 backdrop-blur px-4 py-3 rounded-4 border border-white border-opacity-10">
                        <div class="status-indicator">
                            <span class="pulse-ring"></span>
                            <span class="pulse-dot"></span>
                        </div>
                        <div class="text-start">
                            <small class="text-white-50 d-block fs-7 uppercase fw-medium">Sistem Status</small>
                            <span class="fw-bold text-success font-monospace small">ONLINE & SECURE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 📊 STATISTIK KARTU (Sleek Modern Cards) -->
    <div class="row g-3 mb-4">
        
        <!-- Total User -->
        <div class="col-6 col-xl-3">
            <div class="card stat-card border-0 shadow-sm rounded-4 p-4 h-100 bg-body position-relative">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="stat-icon-box bg-primary-subtle text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-8 fw-semibold">User</span>
                </div>
                <div>
                    <span class="text-muted text-uppercase fw-bold fs-8 tracking-wider d-block mb-1">Total Pengguna</span>
                    <h2 class="fw-bold mb-0 text-body tracking-tight">{{ $totalUser ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Alat -->
        <div class="col-6 col-xl-3">
            <div class="card stat-card border-0 shadow-sm rounded-4 p-4 h-100 bg-body position-relative">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="stat-icon-box bg-info-subtle text-info">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <span class="badge bg-info-subtle text-info rounded-pill px-2 py-1 fs-8 fw-semibold">Inventaris</span>
                </div>
                <div>
                    <span class="text-muted text-uppercase fw-bold fs-8 tracking-wider d-block mb-1">Total Alat</span>
                    <h2 class="fw-bold mb-0 text-body tracking-tight">{{ $totalAlat ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <!-- Peminjaman -->
        <div class="col-6 col-xl-3">
            <div class="card stat-card border-0 shadow-sm rounded-4 p-4 h-100 bg-body position-relative">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="stat-icon-box bg-warning-subtle text-warning-emphasis">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-2 py-1 fs-8 fw-semibold">Transaksi</span>
                </div>
                <div>
                    <span class="text-muted text-uppercase fw-bold fs-8 tracking-wider d-block mb-1">Peminjaman</span>
                    <h2 class="fw-bold mb-0 text-body tracking-tight">{{ $totalPeminjaman ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <!-- Pengembalian -->
        <div class="col-6 col-xl-3">
            <div class="card stat-card border-0 shadow-sm rounded-4 p-4 h-100 bg-body position-relative">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="stat-icon-box bg-success-subtle text-success">
                        <i class="bi bi-database-check"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-8 fw-semibold">Selesai</span>
                </div>
                <div>
                    <span class="text-muted text-uppercase fw-bold fs-8 tracking-wider d-block mb-1">Pengembalian</span>
                    <h2 class="fw-bold mb-0 text-body tracking-tight">{{ $totalPengembalian ?? 0 }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- 🗂️ MENU KELOLA SISTEM (Bento Grid Style) -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h5 class="fw-bold text-body mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-grid-fill text-primary"></i> Menu Manajemen Sistem
            </h5>
            <small class="text-muted">Pilih modul navigasi di bawah ini untuk mengelola data</small>
        </div>
    </div>

    <div class="row g-3 mb-4">

        <!-- 1. Manage User -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('admin.users.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-gear fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Manage User</h6>
                    <small class="text-primary fw-medium d-block mb-2">Kelola Akun Pengguna</small>
                    <p class="text-muted small mb-0 fs-7">Pengaturan pendaftaran akun baru, reset password, dan daftar pengguna terdaftar.</p>
                </div>
            </a>
        </div>

        <!-- 2. Manage Role -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('admin.roles.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-shield-lock fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Manage Role</h6>
                    <small class="text-primary fw-medium d-block mb-2">Hak Akses & Kewenangan</small>
                    <p class="text-muted small mb-0 fs-7">Tambah, ubah, atau atur peran hak akses pengguna (Admin, Petugas, Siswa).</p>
                </div>
            </a>
        </div>

        <!-- 3. Kategori Alat -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('kategori.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-tags fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Kategori Alat</h6>
                    <small class="text-primary fw-medium d-block mb-2">Pengelompokan Barang</small>
                    <p class="text-muted small mb-0 fs-7">Kelola grup dan kategori untuk mempermudah pemilahan barang inventaris.</p>
                </div>
            </a>
        </div>

        <!-- 4. Data Alat -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('alat.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Data Alat</h6>
                    <small class="text-primary fw-medium d-block mb-2">Stok & Spesifikasi Alat</small>
                    <p class="text-muted small mb-0 fs-7">Tambah item barang/alat baru, update jumlah stok, dan informasi kondisi alat.</p>
                </div>
            </a>
        </div>

        <!-- 5. Persetujuan Peminjaman -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('peminjaman.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-checklist fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Persetujuan Peminjaman</h6>
                    <small class="text-primary fw-medium d-block mb-2">Verifikasi Pengajuan</small>
                    <p class="text-muted small mb-0 fs-7">Proses persetujuan (Approve/Reject) pengajuan peminjaman alat dari siswa.</p>
                </div>
            </a>
        </div>

        <!-- 6. Data Pengembalian -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('pengembalian.index') }}" class="card bento-card h-100 text-decoration-none border shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="bento-icon rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-arrow-in-down-left fs-4"></i>
                    </div>
                    <div class="bento-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>
                <div>
                    <h6 class="fw-bold text-body mb-1 fs-5">Data Pengembalian</h6>
                    <small class="text-primary fw-medium d-block mb-2">Pencatatan & Denda</small>
                    <p class="text-muted small mb-0 fs-7">Konfirmasi pengembalian barang, cek keterlambatan, dan pencatatan denda.</p>
                </div>
            </a>
        </div>

    </div>

    <!-- 💾 DATABASE BACKUP SECTION (Sleek Full-Width Card) -->
    <div class="card border-0 shadow-sm rounded-4 p-2 bg-body database-card mb-3">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-danger-subtle text-danger p-3 rounded-3 fs-4 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                    <i class="bi bi-database-down"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 fs-5 text-body">Database Backup Center</h6>
                    <small class="text-muted">Unduh file cadangan data SQL sistem secara berkala untuk pencegahan kehilangan data.</small>
                </div>
            </div>
            <a href="{{ route('admin.database.export') }}" class="btn btn-danger rounded-pill px-4 py-2.5 fw-semibold shadow-sm d-inline-flex align-items-center gap-2 hover-lift">
                <i class="bi bi-download"></i> Unduh Backup SQL
            </a>
        </div>
    </div>

</div>

<style>
    /* Styling High-End Tech Dashboard */
    .premium-banner {
        background: linear-gradient(135deg, #0b1120 0%, #1e1b4b 50%, #0f172a 100%);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .banner-glow-1 {
        position: absolute;
        top: -60px;
        right: -30px;
        width: 220px;
        height: 220px;
        background: rgba(99, 102, 241, 0.2);
        filter: blur(60px);
        border-radius: 50%;
        pointer-events: none;
    }

    .banner-glow-2 {
        position: absolute;
        bottom: -60px;
        left: 10%;
        width: 180px;
        height: 180px;
        background: rgba(245, 158, 11, 0.15);
        filter: blur(60px);
        border-radius: 50%;
        pointer-events: none;
    }

    .backdrop-blur {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .text-gradient-gold {
        background: linear-gradient(135deg, #fef08a 0%, #fde047 50%, #eab308 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Live Pulse Status */
    .status-indicator {
        position: relative;
        width: 12px;
        height: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        background-color: #22c55e;
        border-radius: 50%;
        z-index: 2;
    }

    .pulse-ring {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: rgba(34, 197, 94, 0.4);
        border-radius: 50%;
        animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }

    @keyframes pulse-ring {
        0% { transform: scale(0.8); opacity: 0.8; }
        100% { transform: scale(2.2); opacity: 0; }
    }

    /* Stat Cards */
    .stat-card {
        border: 1px solid var(--bs-border-color-translucent) !important;
        transition: all 0.25s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        border-color: var(--bs-primary) !important;
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.06) !important;
    }

    .stat-icon-box {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    /* Bento Grid Menu Cards */
    .bento-card {
        background-color: var(--bs-card-bg);
        border-color: var(--bs-border-color-translucent) !important;
        transition: all 0.25s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .bento-icon {
        width: 48px;
        height: 48px;
        background-color: var(--bs-tertiary-bg);
        color: var(--bs-primary);
        transition: all 0.25s ease;
    }

    .bento-arrow {
        width: 32px;
        height: 32px;
        background-color: var(--bs-tertiary-bg);
        color: var(--bs-secondary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        transition: all 0.25s ease;
    }

    .bento-card:hover {
        border-color: var(--bs-primary) !important;
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.08) !important;
    }

    .bento-card:hover .bento-icon {
        background-color: var(--bs-primary);
        color: #ffffff;
        transform: scale(1.05);
    }

    .bento-card:hover .bento-arrow {
        background-color: var(--bs-primary);
        color: #ffffff;
        transform: translate(2px, -2px);
    }

    .database-card {
        border: 1px solid var(--bs-border-color-translucent) !important;
        transition: all 0.2s ease;
    }
    .database-card:hover {
        border-color: var(--bs-danger) !important;
    }

    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(220, 53, 69, 0.2) !important;
    }

    .fs-7 { font-size: 0.8125rem; line-height: 1.4; }
    .fs-8 { font-size: 0.75rem; }
    .tracking-wider { letter-spacing: 0.06em; }
    .tracking-wide { letter-spacing: 0.04em; }
</style>
@endsection