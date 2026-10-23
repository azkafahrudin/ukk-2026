@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Kategori')

@section('content')
<div class="container-fluid py-4 px-4">
    
    <!-- Header Halaman & Tombol Tambah -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Kategori')

@section('content')
<div class="container-fluid py-4 px-4">
    
    <!-- Header Halaman & Tombol Tambah -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="bg-warning-subtle text-warning p-2.5 rounded-3 d-flex align-items-center justify-content-center shadow-2xs" style="width: 42px; height: 42px;">
                    <i class="bi bi-tags-fill fs-5"></i>
                </div>
                <h3 class="fw-bold mb-0 tracking-tight">Daftar Kategori Alat</h3>
            </div>
            <p class="text-body-secondary small mb-0">Kelola pengelompokan dan kategori data inventaris alat dengan mudah.</p>
        </div>
        
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('kategori.create') }}" class="btn btn-warning text-dark px-4 py-2.5 rounded-3 fw-semibold shadow-sm d-inline-flex align-items-center gap-2 transition-all">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Kategori Baru</span>
            </a>
        </div>
    </div>

    <!-- Kartu Statistik Ringkas (Biar Tampilan Lebih Ramai & Padat) -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3 fs-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-collection-fill"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Total Kategori</span>
                        <h4 class="fw-bold mb-0 text-body">{{ method_exists($data, 'total') ? $data->total() : count($data) }} <span class="fs-7 fw-normal text-muted">Kategori</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kotak Pencarian Lokal Sederhana -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-body">
        <div class="input-group">
            <span class="input-group-text bg-body-secondary border-end-0 text-muted"><i class="bi bi-search"></i></span>
            <input type="text" id="searchKategori" class="form-control border-start-0 ps-0 bg-body text-body shadow-none" placeholder="Cari nama kategori atau kode kategori di halaman ini...">
        </div>
    </div>

    <!-- Card Pembungkus Tabel -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tabelKategori">
                    <thead class="bg-body-tertiary border-bottom text-body-secondary text-uppercase fs-8 tracking-wider">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 5%;">No</th>
                            <th class="py-3 px-3">Nama Kategori</th>
                            <th class="py-3 px-3">Kode Kategori</th>
                            <th class="py-3 px-3">Keterangan</th>
                            <th class="py-3 px-4 text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($data as $kategoris)
                        <tr>
                            <td class="px-4 text-center text-body-secondary fw-medium fs-7">{{ $no++ }}</td>
                            
                            <td class="px-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8 flex-shrink-0" style="width: 30px; height: 30px;">
                                        {{ strtoupper(substr($kategoris->nama_kategori, 0, 1)) }}
                                    </div>
                                    <div class="fw-semibold text-body fs-7">{{ $kategoris->nama_kategori }}</div>
                                </div>
                            </td>

                            <td class="px-3">
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle font-monospace fw-semibold px-2.5 py-1.5 rounded-2 fs-8">
                                    <i class="bi bi-upc me-1"></i>{{ $kategoris->kode_kategori }}
                                </span>
                            </td>

                            <td class="px-3">
                                <span class="text-body-secondary fs-7">{{ $kategoris->keterangan ?? '-' }}</span>
                            </td>

                            <td class="px-4 text-center">
                                <div class="d-inline-flex align-items-center justify-content-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kategori.edit', ['kategori' => $kategoris->id_kategori]) }}" class="btn btn-sm btn-outline-warning text-body fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs" title="Edit">
                                        <i class="bi bi-pencil-square text-warning"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('kategori.delete', ['id' => $kategoris->id_kategori]) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs" title="Hapus">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-body-secondary">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                                        <i class="bi bi-inbox fs-2"></i>
                                    </div>
                                    <span class="fs-7 fw-semibold text-body">Belum ada data kategori yang ditambahkan.</span>
                                    <p class="text-muted small mb-0">Silakan tambahkan kategori baru menggunakan tombol di atas.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Bagian Pagination -->
        @if(method_exists($data, 'hasPages') && $data->hasPages())
        <div class="card-footer bg-transparent py-3 border-top-0 d-flex justify-content-end">
            {!! $data->links() !!}
        </div>
        @endif
    </div>

</div>

<!-- Script Filter Pencarian Cepat -->
<script>
    document.getElementById('searchKategori').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#tabelKategori tbody tr');
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
            <h3 class="fw-bold mb-1 tracking-tight">Daftar Kategori</h3>
            <p class="text-body-secondary small mb-0">Kelola data kategori alat inventaris.</p>
        </div>
        <a href="{{ route('kategori.create') }}" class="btn btn-brand btn-sm text-dark px-3 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2 fw-medium">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Kategori Baru</span>
        </a>
    </div>

    <!-- Card Pembungkus Tabel yang Seragam -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-body-tertiary border-bottom text-body-secondary text-uppercase fs-8 tracking-wider">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 5%;">No</th>
                            <th class="py-3 px-3">Nama Kategori</th>
                            <th class="py-3 px-3">Kode Kategori</th>
                            <th class="py-3 px-3">Keterangan</th>
                            <th class="py-3 px-4 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($data as $kategoris)
                        <tr>
                            <td class="px-4 text-center text-body-secondary fw-medium fs-7">{{ $no++ }}</td>
                            
                            <td class="px-3">
                                <div class="fw-semibold text-body fs-7">{{ $kategoris->nama_kategori }}</div>
                            </td>

                            <td class="px-3">
                                <span class="badge bg-primary-subtle text-primary-emphasis border border-primary-subtle font-monospace fw-semibold px-2.5 py-1.5 rounded-2 fs-8">
                                    {{ $kategoris->kode_kategori }}
                                </span>
                            </td>

                            <td class="px-3">
                                <span class="text-body-secondary fs-7">{{ $kategoris->keterangan ?? '-' }}</span>
                            </td>

                            <td class="px-4 text-center">
                                <div class="d-inline-flex align-items-center justify-content-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kategori.edit', ['kategori' => $kategoris->id_kategori]) }}" class="btn btn-sm btn-outline-warning fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs" title="Edit">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('kategori.delete', ['id' => $kategoris->id_kategori]) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold px-3 py-1.5 rounded-3 d-inline-flex align-items-center gap-1.5 fs-7 shadow-2xs" title="Hapus">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-body-secondary">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <i class="bi bi-inbox fs-2 opacity-50"></i>
                                    <span class="fs-7">Belum ada data kategori yang ditambahkan.</span>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Bagian Pagination -->
        @if(method_exists($data, 'hasPages') && $data->hasPages())
        <div class="card-footer bg-transparent py-3 border-top-0 d-flex justify-content-end">
            {!! $data->links() !!}
        </div>
        @endif
    </div>

</div>
@endsection