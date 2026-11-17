@extends('layouts.app')

@section('title', config('app.name') . ' — Profil Peminjam')

@section('content')
<div class="container-fluid px-0 py-3">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Notifikasi Pesan Sukses -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4 bg-card-custom p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="bg-yellow-subtle text-yellow-custom p-3 rounded-4 fs-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1 text-body">Profil Peminjam</h4>
                        <p class="text-body-secondary fs-7 mb-0">Lengkapi data diri dan informasi akademik kamu sebagai peminjam.</p>
                    </div>
                </div>

                <form action="{{ route('peminjam.profile.update') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold fs-7">Username (Akun)</label>
                            <input type="text" class="form-control bg-body-tertiary" value="{{ $user->username }}" disabled>
                            <small class="text-body-secondary fs-8">Username tidak dapat diubah.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold fs-7">Role Pengguna</label>
                            <input type="text" class="form-control bg-body-tertiary text-capitalize" value="{{ $user->role }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="nama_lengkap" class="form-label fw-semibold fs-7">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $profile->nama_lengkap ?? '') }}" placeholder="Contoh: Budi Santoso">
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nis_nisn" class="form-label fw-semibold fs-7">NIS / NISN</label>
                            <input type="text" class="form-control @error('nis_nisn') is-invalid @enderror" id="nis_nisn" name="nis_nisn" value="{{ old('nis_nisn', $profile->nis_nisn ?? '') }}" placeholder="Contoh: 12345678">
                            @error('nis_nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="kelas" class="form-label fw-semibold fs-7">Kelas</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $profile->kelas ?? '') }}" placeholder="Contoh: XII RPL 1">
                            @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label for="no_telepon" class="form-label fw-semibold fs-7">Nomor Telepon / WhatsApp</label>
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $profile->no_telepon ?? '') }}" placeholder="Contoh: 081234567890">
                            @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label fw-semibold fs-7">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat domisili kamu...">{{ old('alamat', $profile->alamat ?? '') }}</textarea>
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 pt-3 d-flex justify-content-end gap-2">
                            <a href="{{ route('peminjam.dashboard') }}" class="btn btn-outline-secondary px-4 py-2.5 rounded-pill fw-semibold">Kembali</a>
                            <button type="submit" class="btn btn-yellow-primary px-4 py-2.5 rounded-pill fw-bold shadow-sm">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection