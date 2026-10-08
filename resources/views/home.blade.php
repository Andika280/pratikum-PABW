@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<main class="home-page">
    <section class="hero" style="background-image: linear-gradient(to right, rgba(27, 94, 32, 0.85), rgba(27, 94, 32, 0.4)), url('{{ asset('images/Gambar 2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container hero-content">
            <h1>Selamat Datang di Agrilink ID</h1>
            <p>Mewujudkan masa depan pertanian digital yang lebih cerdas dan terhubung.</p>
            <div class="hero-actions">
                <a href="{{ route('marketplace') }}" class="btn btn-hero">
                    Mulai Sekarang
                </a>
            </div>
        </div>

        <div class="features-preview container">
            <div class="feature-card">
                <a href="{{ route('marketplace') }}" style="text-decoration:none; color:inherit;">
                    <i class="bi bi-shop"></i>
                    <h3>Marketplace</h3>
                    <p>Jual beli hasil panen langsung dari petani ke konsumen.</p>
                </a>
            </div>
            <div class="feature-card">
                <a href="#" style="text-decoration:none; color:inherit;">
                    <i class="bi bi-cloud-sun"></i>
                    <h3>Info Cuaca</h3>
                    <p>Pantau prakiraan cuaca akurat untuk jadwal tanam optimal.</p>
                </a>
            </div>
            <div class="feature-card">
                <a href="#" style="text-decoration:none; color:inherit;">
                    <i class="bi bi-book"></i>
                    <h3>Edukasi</h3>
                    <p>Pelajari teknik bertani modern melalui video panduan.</p>
                </a>
            </div>
        </div>
    </section>
</main>
@endsection