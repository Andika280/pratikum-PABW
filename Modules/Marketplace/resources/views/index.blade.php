@extends('layouts.main')

@section('title', 'Marketplace - Agrilink ID')

<link rel="stylesheet" href="{{ asset('css/style1.css') }}">

@section('content')
<div class="container my-4">
    
    <!-- Banner Marketplace dengan Search Bar & Filter -->
    <div class="p-4 mb-4 rounded-3 text-white position-relative shadow" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="container py-3">
            <h1 class="fw-bold text-white mb-2">Marketplace Pertanian</h1>
            <p class="text-light mb-4">Beli hasil bumi segar langsung dari para petani terbaik.</p>
            
            <!-- Kolom Pencarian & Tombol Filter Kategori -->
            <div class="row align-items-center g-2">
                <div class="col-lg-7">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-0 py-2" placeholder="Cari beras, jagung, sayuran...">
                    </div>
                </div>
                <div class="col-lg-5 d-flex flex-wrap gap-2 justify-content-lg-end">
                    <button class="btn btn-success btn-sm px-3 fw-bold">Semua</button>
                    <button class="btn btn-light btn-sm px-3 text-dark fw-bold">Grains</button>
                    <button class="btn btn-light btn-sm px-3 text-dark fw-bold">Vegetables</button>
                    <button class="btn btn-light btn-sm px-3 text-dark fw-bold">Fruits</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Kartu Produk (4 Kolom) -->
    <div class="row">
        
        <!-- Produk 1: Tomat Cherry -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="text-white d-flex align-items-center justify-content-center position-relative" style="height: 140px; background-color: #4a5568;">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2 px-2 py-1" style="font-size: 0.7rem;">TERSEDIA</span>
                    <h2 class="fw-bold mb-0 text-white">TC</h2>
                </div>
                <div class="card-body bg-white d-flex flex-column p-3">
                    <h6 class="fw-bold text-dark mb-1">Tomat Cherry</h6>
                    <p class="text-success fw-bold mb-3 fs-6">Rp 24.292 <small class="text-muted fw-normal" style="font-size: 0.75rem;">/kg</small></p>
                    <div class="d-flex justify-content-between align-items-center text-muted mt-auto pt-2 border-top" style="font-size: 0.75rem;">
                        <span><i class="bi bi-person"></i> Petani Lokal</span>
                        <span class="fw-bold text-dark">53 kg ready</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk 2: Bawang Merah -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="text-white d-flex align-items-center justify-content-center position-relative" style="height: 140px; background-color: #2b6cb0;">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2 px-2 py-1" style="font-size: 0.7rem;">TERSEDIA</span>
                    <h2 class="fw-bold mb-0 text-white">BM</h2>
                </div>
                <div class="card-body bg-white d-flex flex-column p-3">
                    <h6 class="fw-bold text-dark mb-1">Bawang Merah</h6>
                    <p class="text-success fw-bold mb-3 fs-6">Rp 35.493 <small class="text-muted fw-normal" style="font-size: 0.75rem;">/kg</small></p>
                    <div class="d-flex justify-content-between align-items-center text-muted mt-auto pt-2 border-top" style="font-size: 0.75rem;">
                        <span><i class="bi bi-person"></i> Petani Lokal</span>
                        <span class="fw-bold text-dark">215 kg ready</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk 3: Tomat Cherry 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="text-white d-flex align-items-center justify-content-center position-relative" style="height: 140px; background-color: #4a5568;">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2 px-2 py-1" style="font-size: 0.7rem;">TERSEDIA</span>
                    <h2 class="fw-bold mb-0 text-white">TC</h2>
                </div>
                <div class="card-body bg-white d-flex flex-column p-3">
                    <h6 class="fw-bold text-dark mb-1">Tomat Cherry</h6>
                    <p class="text-success fw-bold mb-3 fs-6">Rp 28.608 <small class="text-muted fw-normal" style="font-size: 0.75rem;">/kg</small></p>
                    <div class="d-flex justify-content-between align-items-center text-muted mt-auto pt-2 border-top" style="font-size: 0.75rem;">
                        <span><i class="bi bi-person"></i> Petani Lokal</span>
                        <span class="fw-bold text-dark">106 kg ready</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk 4: Kentang -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="text-white d-flex align-items-center justify-content-center position-relative" style="height: 140px; background-color: #2f855a;">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2 px-2 py-1" style="font-size: 0.7rem;">TERSEDIA</span>
                    <h2 class="fw-bold mb-0 text-white">KE</h2>
                </div>
                <div class="card-body bg-white d-flex flex-column p-3">
                    <h6 class="fw-bold text-dark mb-1">Kentang</h6>
                    <p class="text-success fw-bold mb-3 fs-6">Rp 24.318 <small class="text-muted fw-normal" style="font-size: 0.75rem;">/kg</small></p>
                    <div class="d-flex justify-content-between align-items-center text-muted mt-auto pt-2 border-top" style="font-size: 0.75rem;">
                        <span><i class="bi bi-person"></i> Petani Lokal</span>
                        <span class="fw-bold text-dark">163 kg ready</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection