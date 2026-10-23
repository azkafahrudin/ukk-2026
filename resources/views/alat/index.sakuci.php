@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Alat')

@section('content')
<div class="container-fluid py-4 px-4">
    
    <!-- Header Halaman & Tombol Aksi -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="bg-warning-subtle text-warning p-2.5 rounded-3 d-flex align-items-center justify-content-center shadow-2xs" style="width: 42px; height: 42px;">
                    <i class="bi bi-box-seam-fill fs-4"></i>
                </div>
                <h2 class="fw-bold mb-0 tracking-tight">Daftar Alat Inventaris</h2>
            </div>
            <p class="text-muted small mb-0">Kelola data alat, pantau kode inventaris, dan kategorisasi dengan lengkap.</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-medium d-inline-flex align-items-center gap-2 shadow-2xs" onclick="window.location.reload();">
                <i class="bi bi-arrow-clockwise"></i>
                <span>Muat Ulang</span>
            </button>
            <a href="{{ route('alat.create') }}" class="btn btn-warning text-dark px-4 py-2.5 rounded-3 fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Alat Baru</span>
            </a>
        </div>
    </div>

    <!-- Kartu Statistik & Filter Ramai (Grid 3 Kolom) -->
    <div class="row g-3 mb-4">
        <!-- Statistik 1 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3 fs-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Total Seluruh Alat</span>
                        <h4 class="fw-bold mb-0 text-body">{{ method_exists($datal, 'total') ? $datal->total() : count($datal) }} <span class="fs-7 fw-normal text-muted">Unit/Data</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik 2 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3 fs-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-tags-fill"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Total Kategori Aktif</span>
                        <h4 class="fw-bold mb-0 text-body">{{ count($kategori ?? []) }} <span class="fs-7 fw-normal text-muted">Kategori</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik 3 / Info Tambahan -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3 fs-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Status Sistem</span>
                        <h4 class="fw-bold mb-0 text-warning fs-6 mt-1">Normal / Operasional</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Pencarian & Filter Cepat -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-body">
        <div class="row g-3 align-items-center">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text bg-body-secondary border-end-0 text-muted ps-3"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control border-start-0 ps-2 bg-body text-body shadow-none" placeholder="Cari nama alat atau kode alat di halaman ini...">
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="text-muted small"><i class="bi bi-info-circle me-1"></i> Menampilkan data inventaris terbaru</span>
            </div>
        </div>
    </div>

    <!-- Card Pembungkus Tabel Utama dengan Desain Baru -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 custom-modern-table" id="tabelAlat">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 5%;">No</th>
                            <th class="py-3 px-3">Nama & Identitas Alat</th>
                            <th class="py-3 px-3">Kode Alat</th>
                            <th class="py-3 px-3">Kategori Inventaris</th>
                            <th class="py-3 px-3 text-center">Status / Info</th>
                            <th class="py-3 px-4 text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($datal as $alats)
                        <tr>
                            <td class="px-4 text-center text-muted fw-semibold fs-7">{{ $no++ }}</td>
                            <td class="px-3">
                                <div class="d-flex align-items-center gap-3 py-1">
                                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold fs-7 flex-shrink-0 shadow-2xs" style="width: 38px; height: 38px;">
                                        {{ strtoupper(substr($alats->nama_alat, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="fw-bold text-body fs-7 d-block">{{ $alats->nama_alat }}</span>
                                        <small class="text-muted font-monospace" style="font-size: 0.75rem;">ID: #{{ $alats->id_alat }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3">
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1.5 font-monospace fw-semibold rounded-2 fs-8">
                                    <i class="bi bi-upc-scan me-1"></i>{{ $alats->kode_alat }}
                                </span>
                            </td>
                            <td class="px-3">
                                @php
                                    $namaKategori = '-';
                                    foreach ($kategori as $k) {
                                        if ($k->id_kategori == $alats->id_kategori) {
                                            $namaKategori = $k->nama_kategori;
                                            break;
                                        }
                                    }
                                @endphp
                                <span class="badge bg-body-secondary text-body border px-2.5 py-1.5 rounded-2 fs-8 fw-medium">
                                    <i class="bi bi-tag-fill me-1 text-warning"></i>{{ $namaKategori }}
                                </span>
                            </td>
                            <td class="px-3 text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-8 fw-medium">
                                    <i class="bi bi-check-circle me-1"></i> Tersedia
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-inline-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ route('alat.edit', ['alat' => $alats->id_alat]) }}" class="btn btn-sm btn-outline-warning text-body fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs">
                                        <i class="bi bi-pencil-square text-warning"></i> Edit
                                    </a>
                                    <form action="{{ route('alat.delete', ['id' => $alats->id_alat]) }}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs" onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                                        <i class="bi bi-inbox fs-1"></i>
                                    </div>
                                    <span class="fs-7 fw-semibold text-body">Belum ada data alat yang ditambahkan.</span>
                                    <p class="text-muted small mb-0">Silakan tambahkan inventaris baru melalui tombol di atas.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Bagian Pagination di Bawah Card -->
        @if(method_exists($datal, 'hasPages') && $datal->hasPages())
        <div class="card-footer bg-transparent py-3 border-top-0 d-flex justify-content-end">
            {!! $datal->links() !!}
        </div>
        @endif
    </div>

</div>

<!-- CSS Tambahan untuk Styling Tabel Modern -->
<style>
    .custom-modern-table {
        border-collapse: separate;
        border-spacing: 0;
    }
    .custom-modern-table thead th {
        background-color: var(--bs-tertiary-bg);
        color: var(--bs-secondary-color);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        border-bottom: 2px solid var(--bs-border-color);
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .custom-modern-table tbody tr {
        transition: background-color 0.15s ease;
    }
    .custom-modern-table tbody tr:hover {
        background-color: var(--bs-tertiary-bg);
    }
    .custom-modern-table tbody td {
        border-bottom: 1px solid var(--bs-border-color-translucent);
        padding-top: 0.85rem;
        padding-bottom: 0.85rem;
    }
    .custom-modern-table tbody tr:last-child td {
        border-bottom: none;
    }
</style>

<!-- Script tambahan untuk fitur pencarian instan lokal -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#tabelAlat tbody tr');
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection