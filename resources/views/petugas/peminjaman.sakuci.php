@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman - inventarishub')

@section('content')
<div class="container-fluid px-4 px-lg-5 py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-medium mb-2 border border-primary-subtle">
                <i class="bi bi-person-badge me-1"></i> Panel Petugas
            </span>
            <h2 class="fw-bold text-body mb-1">Persetujuan Peminjaman Alat</h2>
            <p class="text-body-secondary mb-0 small">Daftar pengajuan peminjaman dari peminjam yang menunggu verifikasi.</p>
        </div>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Alert Error -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 bg-body p-4 border border-opacity-10">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-3 rounded-start-3" width="5%">No</th>
                        <th class="py-3" width="15%">ID Peminjaman</th>
                        <th class="py-3" width="35%">Nama Alat & Peminjam</th>
                        <th class="py-3" width="15%">Status</th>
                        <th class="py-3 px-3 rounded-end-3 text-center" width="30%">Aksi Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datap as $index => $item)
                    <tr>
                        <td class="px-3 text-body-secondary fw-medium">{{ $datap->firstItem() + $index }}</td>
                        <td class="fw-semibold text-body">#{{ $item->id_peminjaman }}</td>
                        <td>
                            <div class="fw-semibold text-body">
                                {{ $item->data_alat->nama_alat ?? ($item->data_alat->nama ?? 'Alat ID: ' . $item->id_alat) }}
                            </div>
                            <div class="small text-body-secondary mt-0.5">
                                {{ $item->data_user->username ?? ($item->data_user->name ?? 'User ID: ' . $item->id_user) }} (Jumlah: {{ $item->jumlah ?? 1 }})
                            </div>
                        </td>
                        <td>
                            @if(strtolower($item->status) == 'pending' || strtolower($item->status) == 'menunggu')
                                <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill fw-medium">Pending</span>
                            @elseif(strtolower($item->status) == 'disetujui')
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-medium">Disetujui</span>
                            @elseif(strtolower($item->status) == 'ditolak')
                                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-medium">Ditolak</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill fw-medium">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td class="px-3 text-center">
                            @if(strtolower($item->status) == 'pending' || strtolower($item->status) == 'menunggu')
                                <div class="d-inline-flex gap-2">
                                    <!-- TOMBOL SETUJUI -->
                                    <form action="{{ route('petugas.peminjaman.setuju', ['id' => $item->id_peminjaman]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm fw-medium">
                                            <i class="bi bi-check2 me-1"></i> Setuju
                                        </button>
                                    </form>

                                    <!-- TOMBOL TOLAK -->
                                    <form action="{{ route('petugas.peminjaman.tolak', ['id' => $item->id_peminjaman]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm fw-medium" onclick="return confirm('Yakin ingin menolak peminjaman ini?')">
                                            <i class="bi bi-x-lg me-1"></i> Tolak
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-body-secondary small fw-semibold">Sudah diproses ({{ $item->status }})</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-body-secondary">Belum ada data pengajuan peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection