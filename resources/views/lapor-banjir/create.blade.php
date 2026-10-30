@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white text-center py-4">
                    <h4 class="text-primary fw-bold mb-0">
                        <i class="fas fa-water"></i> Form Lapor Banjir Baru
                    </h4>
                    <p class="text-muted small mb-0 mt-1">Silakan isi formulir di bawah ini dengan data yang valid.</p>
                </div>
                <div class="card-body p-4">
                    
                    <!-- Tampilkan Pesan Error Validasi Jika Ada -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi Kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Input -->
                    <form action="{{ route('lapor-banjir.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-control" value="{{ old('nama_pelapor') }}" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">No. HP (WhatsApp)</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="Contoh: 08123456789" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi Kejadian (Jalan/Desa)</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" placeholder="Contoh: Baleendah, Dayeuhkolot" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}" placeholder="Contoh: Baleendah" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tinggi Genangan Air (cm)</label>
                                <input type="number" name="tinggi_air" class="form-control" value="{{ old('tinggi_air') }}" placeholder="0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Kejadian</label>
                                <input type="date" name="tanggal_kejadian" class="form-control" value="{{ old('tanggal_kejadian') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Keterangan / Kondisi (Opsional)</label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Tuliskan kondisi terkini...">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto Bukti Banjir (Maks 2MB)</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            <i class="fas fa-paper-plane"></i> Kirim Laporan
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection