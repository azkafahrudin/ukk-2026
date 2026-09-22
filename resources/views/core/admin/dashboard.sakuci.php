@extends('layouts.app')

@section('title', 'Admin')

@section('content')

    <!-- Tombol Titik Tiga (Trigger Sidebar Dashboard) -->
    <div class="d-flex align-items-center mb-4">
        <button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm" 
                type="button" 
                data-bs-toggle="offcanvas" 
                data-bs-target="#adminSidebar" 
                aria-controls="adminSidebar">
            <!-- Ikon Titik Tiga (Bootstrap Icons) -->
            <i class="bi bi-three-dots-vertical fs-5"></i>
            <span class="fw-semibold">Menu Admin</span>
        </button>
    </div>

    <!-- Sidebar Khusus Dashboard (Offcanvas) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold" id="adminSidebarLabel">Navigasi Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted small mb-3">Pintasan cepat menu pengelolaan sistem:</p>
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link text-body bg-light hover-bg">
                        <i class="bi bi-shield-lock me-2"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('alat.index') }}" class="nav-link text-body bg-light hover-bg">
                        <i class="bi bi-people me-2"></i> Alat
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.database.export') }}" class="nav-link text-body bg-light hover-bg">
                        <i class="bi bi-database-down me-2"></i> Download Database
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Konten Utama Dashboard -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">Area Admin</span>
            <h1 class="h4 mb-2">Halo, {{ $user->username }}</h1>
            <p class="text-secondary mb-0">Halaman ini hanya bisa diakses role <code class="inline">admin</code> (middleware <code class="inline">admin</code>).</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('admin.roles.index') }}" class="card border-0 shadow-sm text-decoration-none h-100">
                <div class="card-body p-4">
                    <h2 class="h6 mb-1">Manage Role</h2>
                    <p class="text-secondary small mb-0">Tambah role baru untuk dipakai saat membuat user.</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.users.index') }}" class="card border-0 shadow-sm text-decoration-none h-100">
                <div class="card-body p-4">
                    <h2 class="h6 mb-1">Manage User</h2>
                    <p class="text-secondary small mb-0">Tambah user baru dan tentukan role-nya.</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.database.export') }}" class="card border-0 shadow-sm text-decoration-none h-100">
                <div class="card-body p-4">
                    <h2 class="h6 mb-1">Download Database</h2>
                    <p class="text-secondary small mb-0">Unduh seluruh isi database jadi satu file .sql, siap diimpor di server.</p>
                </div>
            </a>
        </div>
    </div>

@endsection