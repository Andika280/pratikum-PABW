<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agrilink ID')</title>
    <!-- Memuat Bootstrap CSS melalui CDN agar tampilan rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memuat Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Memuat CSS Kustom Anda (jika ada) -->
    <link rel="stylesheet" href="{{ asset('css/App.css') }}">
</head>
<body class="bg-light">

    <!-- Navbar Agrilink -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-success fw-bold" href="{{ route('home') }}">
                <i class="bi bi-leaf"></i> Agrilink ID
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Cuaca</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Edukasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('marketplace') }}">Marketplace</a></li>
                    
                    {{-- Logika Auth: Jika sudah login, tampilkan menu Produk dan Logout --}}
                    @auth
                        <li class="nav-item"><a class="nav-link fw-bold text-success" href="{{ route('produk.index') }}">Produk Saya</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    {{-- Tombol Logout --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-outline-success ms-3" href="{{ route('login', ['app' => 'agrilink']) }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Memuat Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>