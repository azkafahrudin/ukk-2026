<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    {{-- Terapkan tema tersimpan sebelum apa pun dirender, supaya tidak ada flash warna --}}
    <script>
        (function () {
            var saved = localStorage.getItem('sakuci-theme');
            var theme = saved || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    {{-- Bootstrap 5.3.8 -- file lokal, tidak butuh internet --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-body-tertiary">

    {{-- Bungkus menggunakan d-flex agar sidebar di kiri dan konten di kanan --}}
    <div class="d-flex min-vh-100">

        {{-- Panggil Sidebar (yang tadinya navbar) --}}
        @include('partials.sidebar')

        {{-- Area Konten Utama di sebelah kanan --}}
        <div class="flex-grow-1 d-flex flex-column">
            
            <main class="container-fluid flex-grow-1 p-4 p-lg-5">
                @include('partials.flash')

                @yield('content')
            </main>

            {{-- Footer ditaruh di dalam area konten kanan bagian bawah --}}
            @include('partials.footer')
            
        </div>

    </div>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
@yield('scripts')

</body>
</html>