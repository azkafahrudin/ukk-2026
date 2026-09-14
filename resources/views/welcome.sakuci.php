@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')

    {{-- Hero --}}
    <section class="text py-4 py-lg-5">
        <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">InventarisHub v1.0.0</span>

        <h1 class="display-5 fw-bold mb-3">
            WEBSITE PEMINJAMAN ALAT<br class="d-none d-md-inline">
            <span class="text-warning">InventarisHub</span>
        </h1>
    </section>
@endsection