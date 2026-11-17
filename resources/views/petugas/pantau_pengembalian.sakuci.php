@extends('layouts.app')

@section('title', 'Pantau Pengembalian - inventarishub')

@section('content')
<div class="container-fluid px-4 px-lg-5 py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-medium mb-2 border border-primary-subtle">
                <i class="bi bi-person-badge me-1"></i> Panel Petugas
            </span>
            <h2 class="fw-bold text-body mb-1">Pantau Pengembalian Alat</h2>
            <p class="text-body-secondary mb-0 small">Memantau riwayat dan pengajuan alat yang dikembalikan oleh peminjam.</p>
        </div>
        <div>
            <a href="{{ route('petugas.pengembalian.cetak') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 rounded-pill fw-medium shadow-sm">
                <i class="bi bi-printer me-1"></i> Cetak Laporan
            </a>
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
                        <th class="py-3" width="15%">Tgl Kembali</th>
                        <th class="py-3" width="35%">Nama Alat & Profil Peminjam</th>
                        <th class="py-3" width="15%">Kondisi / Status</th>
                        <th class="py-3 px-3 rounded-end-3 text-center" width="30%">Aksi Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datap as $index => $item)
                        @php
                            $peminjaman = $peminjamanList[$item->id_peminjaman] ?? null;
                            $userId = $peminjaman ? $peminjaman->id_user : null;
                            $namaUser = $peminjaman ? ($userList[$userId] ?? 'Tidak diketahui') : 'Tidak diketahui';
                            $namaAlat = $peminjaman ? ($alatList[$peminjaman->id_alat] ?? 'Alat dihapus') : 'Alat dihapus';
                            $status = $item->status ?? 'Pending';
                            $peminjamObj = $userId ? ($userObjList[$userId] ?? null) : null;
                        @endphp
                        <tr>
                            <td class="px-3 text-body-secondary fw-medium">{{ $datap->firstItem() + $index }}</td>
                            <td class="fw-semibold text-body small">
                                <i class="bi bi-calendar-event me-1 text-secondary"></i> 
                                {{ date('d M Y', strtotime($item->tanggal_pengembalian)) }}
                            </td>
                            <td>
                                <!-- Nama Alat -->
                                <div class="fw-semibold text-body fs-6">
                                    <i class="bi bi-box-seam me-1 text-warning"></i> {{ $namaAlat }}
                                </div>

                                <!-- Detail Profil Peminjam -->
                                <div class="small mt-1 p-2 rounded bg-body-tertiary border">
                                    <div class="fw-bold text-dark">
                                        <i class="bi bi-person-fill text-primary me-1"></i> 
                                        {{ $peminjamObj->profile->nama_lengkap ?? $peminjamObj->username ?? $namaUser }}
                                    </div>
                                    <div class="text-muted mt-0.5" style="font-size: 0.78rem;">
                                        <span><strong>NIS/ID:</strong> {{ $peminjamObj->profile->nis_nisn ?? $peminjamObj->nomor_identitas ?? '-' }}</span> | 
                                        <span><strong>Kelas:</strong> {{ $peminjamObj->profile->kelas ?? '-' }}</span> | 
                                        <span><strong>HP:</strong> {{ $peminjamObj->profile->no_telepon ?? $peminjamObj->telepon ?? '-' }}</span>
                                    </div>
                                    <div class="mt-1 text-secondary" style="font-size: 0.75rem;">
                                        <i class="bi bi-chat-left-text me-1"></i> Catatan: {{ $item->catatan ?? 'Tidak ada catatan' }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="mb-1">
                                    @if(strtolower($item->kondisi_barang) == 'baik')
                                        <span class="badge bg-success-subtle text-success px-2 py-1 rounded-3 small">Baik</span>
                                    @elseif(str_contains(strtolower($item->kondisi_barang), 'rusak'))
                                        <span class="badge bg-danger-subtle text-danger px-2 py-1 rounded-3 small">{{ $item->kondisi_barang }}</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning px-2 py-1 rounded-3 small">{{ $item->kondisi_barang }}</span>
                                    @endif
                                </div>
                                <div>
                                    @if(strtolower($status) == 'disetujui' || strtolower($status) == 'selesai')
                                        <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill small fw-medium">Disetujui</span>
                                    @elseif(strtolower($status) == 'ditolak')
                                        <span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill small fw-medium">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning px-3 py-1 rounded-pill small fw-medium">Pending</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 text-center">
                                @if(strtolower($status) == 'pending' || strtolower($status) == 'menunggu' || empty($status) || $status == 'Pending')
                                    <div class="d-inline-flex gap-2">
                                        <!-- TOMBOL SETUJUI -->
                                        <form action="{{ route('petugas.pengembalian.setujui', ['id' => $item->id_pengembalian]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm fw-medium">
                                                <i class="bi bi-check2 me-1"></i> Setuju
                                            </button>
                                        </form>

                                        <!-- TOMBOL TOLAK -->
                                        <form action="{{ route('petugas.pengembalian.tolak', ['id' => $item->id_pengembalian]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm fw-medium" onclick="return confirm('Yakin ingin menolak pengembalian ini?')">
                                                <i class="bi bi-x-lg me-1"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-body-secondary small fw-semibold">Sudah diproses</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-body-secondary">Belum ada data pengembalian alat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection