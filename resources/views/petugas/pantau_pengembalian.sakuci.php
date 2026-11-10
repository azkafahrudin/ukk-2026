@extends('layouts.app')

@section('title', 'Pantau Pengembalian - inventarishub')

@section('content')
<div class="container-fluid px-4 py-4">
    
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Pantau Pengembalian</h3>
            <p class="text-body-secondary mb-0">Memantau riwayat alat yang telah dikembalikan oleh siswa.</p>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <!-- Tombol Cetak Laporan (Responsif Light/Dark Mode) -->
            <a href="{{ route('petugas.pengembalian.cetak') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 rounded-pill fw-medium shadow-sm">
                <i class="bi bi-printer me-1"></i> Cetak Laporan
            </a>
            
            <span class="badge bg-info text-dark px-3 py-2 rounded-pill fw-medium shadow-sm">
                <i class="bi bi-person-check me-1"></i> Akses Petugas
            </span>
        </div>
    </div>

    <!-- Tabel Data Pengembalian -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="py-3" width="5%">#</th>
                            <th class="py-3" width="15%">Tgl Kembali</th>
                            <th class="py-3" width="20%">Nama Peminjam</th>
                            <th class="py-3" width="25%">Nama Alat</th>
                            <th class="py-3" width="15%">Kondisi</th>
                            <th class="py-3 text-end" width="20%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datap as $index => $item)
                            @php
                                $peminjaman = $peminjamanList[$item->id_peminjaman] ?? null;
                                $namaUser = $peminjaman ? ($userList[$peminjaman->id_user] ?? 'Tidak diketahui') : 'Tidak diketahui';
                                $namaAlat = $peminjaman ? ($alatList[$peminjaman->id_alat] ?? 'Alat dihapus') : 'Alat dihapus';
                                $status = $item->status ?? 'Pending';
                            @endphp
                            <tr>
                                <td class="py-3 text-body-secondary">{{ $datap->firstItem() + $index }}</td>
                                <td class="py-3">{{ date('d M Y', strtotime($item->tanggal_pengembalian)) }}</td>
                                <td class="py-3 fw-medium text-primary">{{ $namaUser }}</td>
                                <td class="py-3">
                                    <i class="bi bi-box-seam text-body-secondary me-2"></i>{{ $namaAlat }}
                                </td>
                                <td class="py-3">
                                    @if(strtolower($item->kondisi_barang) == 'baik')
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-3">Baik</span>
                                    @elseif(strtolower($item->kondisi_barang) == 'ringan rusak' || strtolower($item->kondisi_barang) == 'rusak ringan')
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 rounded-3">Rusak Ringan</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded-3">{{ $item->kondisi_barang ?? 'Rusak' }}</span>
                                    @endif
                                </td>
                                <td class="py-3 text-end">
                                    @if(strtolower($status) == 'disetujui' || strtolower($status) == 'selesai')
                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                            <i class="bi bi-check-circle me-1"></i> Disetujui
                                        </span>
                                    @elseif(strtolower($status) == 'ditolak')
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                            <i class="bi bi-x-circle me-1"></i> Ditolak
                                        </span>
                                    @else
                                        <!-- Tombol Aksi untuk Petugas jika status masih Pending -->
                                        <div class="d-inline-flex gap-1">
                                            <!-- DIPERBAIKI: Menggunakan array untuk route parameter -->
                                            <form action="{{ route('petugas.pengembalian.setujui', ['id' => $item->id_pengembalian]) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success px-2 py-1 rounded-2 shadow-2xs" title="Setujui Pengembalian">
                                                    <i class="bi bi-check-lg"></i> Setuju
                                                </button>
                                            </form>
                                            
                                            <!-- DIPERBAIKI: Menggunakan array untuk route parameter -->
                                            <form action="{{ route('petugas.pengembalian.tolak', ['id' => $item->id_pengembalian]) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger px-2 py-1 rounded-2 shadow-2xs" title="Tolak Pengembalian" onclick="return confirm('Yakin ingin menolak pengembalian ini?')">
                                                    <i class="bi bi-x-lg"></i> Tolak
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-body-secondary">
                                    <i class="bi bi-inbox fs-2 d-block mb-3 opacity-25"></i>
                                    Belum ada data pengembalian alat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($datap->hasPages())
                <div class="d-flex justify-content-end mt-4">
                    {{ $datap->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection