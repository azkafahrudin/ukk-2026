@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Hero --}}
    <section class="text py-4 py-lg-5">
        <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">InventarisHub v1.0.0</span>

        <h1 class="display-5 fw-bold mb-3">
            WEBSITE PEMINJAMAN ALAT<br class="d-none d-md-inline">
            <span class="text-brand">InventarisHub</span>
        </h1>
    </section>
<div class="d-flex gap-3">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <i class="bi bi-folder-fill fs-3 text-brand mb-2"></i>
      <h5 class="card-title">KATEGORI</h5>
      <p class="card-text">Klik untuk melihat kategori</p>
      <a href="{{ route('kategori.index') }}" class="btn btn-brand mb-3">KLIK</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <i class="bi bi-tools fs-3 text-brand mb-2"></i>
      <h5 class="card-title">ALAT</h5>
      <p class="card-text">Klik untuk melihat Alat</p>
      <a href="{{ route('alat.index') }}" class="btn btn-brand mb-3">KLIK</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <i class="bi bi-folder-fill fs-3 text-brand mb-2"></i>
      <h5 class="card-title">Data peminjam</h5>
      <p class="card-text">Klik untuk melihat data peminjam</p>
      <a href="" class="btn btn-brand mb-3">KLIK</a>
    </div>
  </div>
</div>
@endsection