<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GoCamps')</title>

    {{-- Link CSS dan JS yang diperlukan --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Bisa menambahkan custom stylesheets jika diperlukan --}}
    @stack('styles')
</head>
<body class="bg-light">

    {{-- Header --}}
    <header>
        {{-- Bisa menambahkan header global disini, seperti navigasi global --}}
    </header>

    {{-- Konten utama halaman --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        {{-- Bisa menambahkan footer global disini --}}
    </footer>

    {{-- Menambahkan Script tambahan jika diperlukan --}}
    @stack('scripts')
</body>
</html>
