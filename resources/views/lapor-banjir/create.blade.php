@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Card Modern -->
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4 text-center">
                    <h4 class="fw-bold text-primary">
                        <i class="fas fa-file-signature me-2"></i>Form Lapor Banjir Baru
                    </h4>
                    <p class="text-muted small">Silakan isi formulir di bawah ini dengan data yang valid.</p>
                </div>
                
                <div class="card-body p-4 p-md-5 pt-3">
                    <form method="POST" action="{{ route('lapor.store') }}">
                        @csrf
                        
                        <!-- Nama Pelapor -->
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold text-secondary">Nama Pelapor</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control border-start-0 py-2" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>

                        <!-- Lokasi Kejadian -->
                        <div class="mb-4">
                            <label for="lokasi" class="form-label fw-semibold text-secondary">Lokasi Kejadian (Kecamatan/Desa)</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control border-start-0 py-2" id="lokasi" name="lokasi" placeholder="Contoh: Baleendah, Dayeuhkolot" required>
                            </div>
                        </div>

                        <!-- Tinggi Air -->
                        <div class="mb-4">
                            <label for="tinggi_air" class="form-label fw-semibold text-secondary">Tinggi Genangan Air</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-water"></i></span>
                                <input type="number" class="form-control border-start-0 py-2" id="tinggi_air" name="tinggi_air" placeholder="0" required>
                                <span class="input-group-text bg-light text-muted">cm</span>
                            </div>
                        </div>

                        <!-- Tanggal Kejadian -->
                        <div class="mb-4">
                            <label for="tanggal" class="form-label fw-semibold text-secondary">Tanggal Kejadian</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-calendar-day"></i></span>
                                <input type="date" class="form-control border-start-0 py-2" id="tanggal" name="tanggal" required>
                            </div>
                        </div>

                        <!-- Tombol Kirim -->
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection