@extends('layouts.main')

@section('title', 'Beranda')

<link rel="stylesheet" href="{{ asset('css/beranda awal.css') }}">

@section('content')
<main class="home-page">
    <section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/Gambar 2.jpg') }}') center/cover; padding: 80px 0; color: white;">
    <div class="container hero-content text-center text-md-start">
        <h1 class="fw-bold display-5 text-white mb-3">Selamat Datang di Agrilink ID</h1>
        <p class="fs-5 text-light mb-4 col-md-8">Mewujudkan masa depan pertanian digital yang lebih cerdas dan terhubung.</p>
        <div class="hero-actions">
            <a href="{{ url('/marketplace') }}" class="btn btn-success btn-lg px-4 fw-bold shadow">Mulai Sekarang</a>
                </a>
            </div>
        </div>

        <div class="features-preview container">
            <div class="feature-card">
                <a href="{{ url('/marketplace') }}" style="text-decoration:none; color:inherit;">
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