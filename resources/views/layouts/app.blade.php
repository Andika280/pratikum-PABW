<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | LaporBanjir BPBD</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; margin: 0; padding: 0; }
        header, footer { background-color: #0056b3; color: white; padding: 15px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
        main { padding: 20px; max-width: 800px; margin: auto; }
        .card { background: white; border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #0056b3; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <header>
        <h1>Sistem LaporBanjir BPBD Kab. Bandung</h1>
        <nav>
            <a href="{{ route('lapor.index') }}">Daftar Laporan</a>
            <a href="{{ route('lapor.create') }}">Buat Laporan Baru</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 BPBD - Andika Rahma Raihan (707012530001)</p>
    </footer>
</body>
</html>