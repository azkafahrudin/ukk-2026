@extends('layouts.app')

@section('title', config('app.name') . ' -- Ajukan Peminjaman Alat')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .inventaris-form {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Kartu adaptif Bright / Dark mode */
    .form-card {
        background-color: var(--bs-card-bg);
        color: var(--bs-card-color);
        border: 1px solid var(--bs-border-color);
        transition: all 0.3s ease;
    }

    .form-card:hover {
        box-shadow: 0 1rem 3rem rgba(255, 215, 0, 0.15) !important;
        border-color: #FFC107;
    }

    .btn-yellow-primary {
        background-color: #FFD700;
        color: #000000;
        border: none;
    }

    .btn-yellow-primary:hover {
        background-color: #FFC107;
        color: #000000;
    }
</style>

<div class="inventaris-form container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-card card shadow-sm rounded-4">
                <div class="card-header py-3 border-bottom rounded-top-4 bg-body-tertiary">
                    <h4 class="fw-bold mb-0 text-body">Form Pengajuan Peminjaman Alat</h4>
                    <p class="text-body-secondary small mb-0">Silakan isi formulir di bawah ini untuk mengajukan peminjaman alat inventaris.</p>
                </div>
                <div class="card-body p-4">
                    
                    @php
                        $currentUser = \App\Models\User::current();
                        $isPengguna = $currentUser && ($currentUser->role == 'pengguna');
                        $storeRoute = $isPengguna ? route('peminjam.storePeminjam.pengguna') : route('peminjam.storePeminjam');
                        $indexRoute = $isPengguna ? route('peminjam.indexPeminjam.pengguna') : route('peminjam.indexPeminjam');
                        
                        $selectedAlatId = $_GET['id_alat'] ?? request('id_alat') ?? '';
                        $daftarAlat = $alat ?? $alats ?? \App\Models\Alat::all();

                        $namaAlatTerpilih = '';
                        if (!empty($selectedAlatId)) {
                            foreach($daftarAlat as $item) {
                                $aId = $item->id_alat ?? $item->id;
                                if ($aId == $selectedAlatId) {
                                    $namaAlatTerpilih = $item->nama_alat ?? $item->nama ?? 'Alat #' . $aId;
                                    break;
                                }
                            }
                        }
                    @endphp

                    <form action="{{ $storeRoute }}" method="POST">
                        @csrf
                        
                        <!-- Pilihan Alat -->
                        <div class="mb-3">
                            <label for="id_alat" class="form-label fw-semibold text-body">Pilih Alat <span class="text-danger">*</span></label>
                            
                            @if(!empty($selectedAlatId))
                                <div class="form-control fw-medium d-flex align-items-center bg-body-tertiary text-body border-secondary-subtle" style="cursor: not-allowed; min-height: 38px;">
                                     {{ $namaAlatTerpilih ?: 'Alat #' . $selectedAlatId }}
                                </div>
                                <input type="hidden" name="id_alat" value="{{ $selectedAlatId }}">
                            @else
                                <select name="id_alat" id="id_alat" class="form-select bg-body text-body border-secondary-subtle" required>
                                    <option value="">-- Pilih Alat Inventaris --</option>
                                    @foreach($daftarAlat as $item)
                                        @php 
                                            $aId = $item->id_alat ?? $item->id;
                                            $aName = $item->nama_alat ?? $item->nama ?? 'Alat #' . $aId;
                                        @endphp
                                        <option value="{{ $aId }}">
                                            {{ $aName }} @if(isset($item->stok)) (Stok: {{ $item->stok }}) @endif
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold text-body">Jumlah Unit <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control bg-body text-body border-secondary-subtle" min="1" value="1" required placeholder="Masukkan jumlah unit yang dipinjam">
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label fw-semibold text-body">Tanggal Pinjam <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control bg-body text-body border-secondary-subtle" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="mb-4">
                            <label for="tanggal_kembali" class="form-label fw-semibold text-body">Rencana Tanggal Kembali <span class="text-body-secondary fw-normal">(Opsional)</span></label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control bg-body text-body border-secondary-subtle">
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ $indexRoute }}" class="btn btn-outline-secondary px-3 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-yellow-primary px-4 fw-bold shadow-sm rounded-pill">
                                <i class="bi bi-send me-1"></i> Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection