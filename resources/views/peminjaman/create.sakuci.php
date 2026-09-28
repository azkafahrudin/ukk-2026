@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Peminjaman')

@section('content')
<div class="container-fluid py-4">
    
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tambah Peminjaman Alat</h2>
            <p class="text-muted small mb-0">Formulir penambahan data peminjaman inventaris baru oleh admin.</p>
        </div>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- Card Pembungkus Form -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        
                        <!-- Pilih User / Peminjam -->
                        <div class="mb-3">
                            <label for="id_user" class="form-label fw-semibold">Pilih User / Peminjam</label>
                            <select name="id_user" id="id_user" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama ?? $user->name ?? $user->username }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Alat -->
                        <div class="mb-3">
                            <label for="id_alat" class="form-label fw-semibold">Pilih Alat</label>
                            <select name="id_alat" id="id_alat" class="form-select" required>
                                <option value="">-- Pilih Alat --</option>
                                @foreach($alat as $item)
                                    <option value="{{ $item->id ?? $item->id_alat }}">{{ $item->nama_alat ?? $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jumlah Unit -->
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold">Jumlah Unit</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" required placeholder="Masukkan jumlah unit">
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali (Aktual)</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                            <div class="form-text text-muted small">Bisa dikosongkan jika alat belum dikembalikan.</div>
                        </div>

                        <!-- Status Peminjaman -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status Peminjaman</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Pending" selected>Pending</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>

                        <!-- Denda -->
                        <div class="mb-4">
                            <label for="denda" class="form-label fw-semibold">Denda (Rp)</label>
                            <input type="number" name="denda" id="denda" class="form-control" value="0" min="0">
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary px-3">
                                <i class="bi bi-x-lg me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Peminjaman
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection