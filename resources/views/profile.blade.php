@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5 text-center">
                    
                    <!-- Avatar Ikon -->
                    <div class="mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 100px; height: 100px; font-size: 3rem;">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>
                    
                    <!-- Informasi Utama -->
                    <h3 class="fw-bold mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-muted mb-4"><i class="fas fa-envelope me-2"></i>{{ Auth::user()->email }}</p>
                    
                    <hr class="text-muted opacity-25">
                    
                    <!-- Detail Tambahan -->
                    <div class="row text-center mt-4 mb-4">
                        <div class="col-6 border-end">
                            <h6 class="text-muted mb-2"><i class="fas fa-id-badge me-1"></i> Peran</h6>
                            <span class="badge bg-success rounded-pill px-3 py-2">Petugas BPBD</span>
                        </div>
                        <div class="col-6">
                            <h6 class="text-muted mb-2"><i class="fas fa-calendar-alt me-1"></i> Terdaftar</h6>
                            <p class="mb-0 fw-semibold">{{ Auth::user()->created_at->format('d M Y') }}</p>
                            <small class="text-muted">({{ Auth::user()->created_at->diffForHumans() }})</small>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-grid mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection