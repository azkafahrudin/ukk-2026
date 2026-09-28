<!-- Sidebar Container -->
<div id="appSidebar" class="app-sidebar d-flex flex-column flex-shrink-0 p-3 bg-body border-end vh-100">
<head>
    <!-- Pastikan baris ini ada di dalam <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
    
    <!-- Bagian Atas: Logo, Tombol Toggle, & Theme -->
    <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom flex-shrink-0">
        <div class="d-flex align-items-center gap-2 overflow-hidden">
            <button id="themeToggle" type="button" class="logo-toggle btn btn-link p-0 text-decoration-none"
                    aria-label="Ganti tema terang/gelap" title="Ganti tema terang/gelap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-body" aria-hidden="true">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
            </button>
            <a class="fs-6 fw-semibold text-decoration-none text-body text-truncate m-0" href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
        <!-- Tombol Tutup Sidebar -->
        <button id="sidebarToggleClose" class="btn btn-sm btn-link text-body p-0 d-lg-none" aria-label="Tutup Menu">
            <i class="bi bi-x-lg fs-5"></i>
        </button>
    </div>

    @php
        $dbConnected = false;
        try {
            \Sakuci\Database\Connection::pdo();
            $dbConnected = true;
        } catch (\Throwable $e) {
            $dbConnected = false;
        }
        $currentUser = \App\Models\User::current();
    @endphp

    <!-- Bagian Menu Navigasi Utama (Ditambahkan overflow-y-auto agar bisa di-scroll jika terlalu panjang) -->
    <ul class="nav nav-pills flex-column mb-auto gap-1 overflow-y-auto pe-1" style="max-height: calc(100vh - 180px);">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('home') ? 'active' : 'link-body-emphasis' }}">
                <i class="bi bi-house-door fs-5 mb-1"></i> 
                <span class="small">Beranda</span>
            </a>
        </li>

        {{-- Menu-menu khusus user yang sudah login --}}
        @if ($currentUser)
        @if ($currentUser->role === 'admin')
            <li class="nav-item">
                <a href="{{ route('alat.index') }}" class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('alat.index') ? 'active' : 'link-body-emphasis' }}">
                    <i class="bi bi-journal-text fs-5 mb-1"></i> 
                    <span class="small">Data alat</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('kategori.index') ? 'active' : 'link-body-emphasis' }}">
                    <i class="bi bi-tags fs-5 mb-1"></i> 
                    <span class="small">Data kategori</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('peminjaman.index') }}" class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('peminjaman.index') ? 'active' : 'link-body-emphasis' }}">
                    <i class="bi bi-clipboard-check fs-5 mb-1"></i> 
                    <span class="small">Data peminjaman</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pengembalian.index') }}" class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('pengembalian.index') ? 'active' : 'link-body-emphasis' }}">
                    <i class="bi bi-clipboard-check fs-5 mb-1"></i> 
                    <span class="small">Data pengembalian</span>
                </a>
            </li>
            @endif

            {{-- Menu Khusus Peminjam --}}
            @if ($currentUser->role === 'peminjam')
                <li class="nav-item">
                    <a href="{{ route('peminjam.indexPeminjam') }}" 
                       class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('peminjam.indexPeminjam') ? 'active' : 'link-body-emphasis' }}">
                        <i class="bi bi-plus-circle fs-5 mb-1"></i> 
                        <span class="small">Ajukan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peminjam.alat') }}" 
                       class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('peminjam.alat') ? 'active' : 'link-body-emphasis' }}">
                        <i class="bi bi-box-seam fs-5 mb-1"></i> 
                        <span class="small">Daftar alat</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ $currentUser->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" 
                   class="nav-link d-flex flex-column align-items-center text-center py-2 {{ is_route('admin.dashboard', 'dashboard') ? 'active' : 'link-body-emphasis' }}">
                    <i class="bi bi-speedometer2 fs-5 mb-1"></i> 
                    <span class="small">Dashboard</span>
                </a>
            </li>
        @endif
    </ul>

    <hr class="flex-shrink-0 my-2">

    <!-- Bagian Bawah: User & Logout -->
    <div class="mt-auto flex-shrink-0">
        @if ($currentUser)
            <div class="mb-2 px-1 small text-muted text-center text-truncate">
                <strong class="text-body">{{ $currentUser->username }}</strong>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-1 py-1 px-0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="small">Logout</span>
                </button>
            </form>
        @else
            @php
                $canRegister = false;
                if ($dbConnected) {
                    try {
                        $canRegister = \App\Models\Role::where('can_register', 1)->exists();
                    } catch (\Throwable $e) {
                        $canRegister = false;
                    }
                }
            @endphp
            
            <div class="d-flex flex-column gap-2">
                @if ($canRegister)
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm w-100">Daftar</a>
                @endif
                <a href="{{ route('login') }}" class="btn btn-brand btn-sm w-100 d-inline-flex align-items-center justify-content-center gap-1">
                    Masuk
                </a>
            </div>
        @endif
    </div>

</div>