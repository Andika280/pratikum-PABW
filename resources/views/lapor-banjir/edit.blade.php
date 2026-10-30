@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Edit Laporan Kejadian Banjir</h4>
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

                    <!-- Form Edit -->
                    <form action="{{ route('lapor-banjir.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-control" value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">No. HP (WhatsApp)</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $laporan->no_hp) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi Kejadian (Jalan/Desa)</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $laporan->lokasi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan', $laporan->kecamatan) }}" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tinggi Genangan Air (cm)</label>
                                <input type="number" name="tinggi_air" class="form-control" value="{{ old('tinggi_air', $laporan->tinggi_air) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Kejadian</label>
                                <input type="date" name="tanggal_kejadian" class="form-control" value="{{ old('tanggal_kejadian', $laporan->tanggal_kejadian) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Status Penanganan</label>
                            <select name="status" class="form-select" required>
                                <option value="Menunggu" {{ old('status', $laporan->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diproses" {{ old('status', $laporan->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ old('status', $laporan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Keterangan / Kondisi (Opsional)</label>
                            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                        </div>

                        <!-- Foto Saat Ini -->
                        <div class="mb-3">
                            <label class="form-label fw-bold d-block">Foto Bukti Saat Ini</label>
                            @if ($laporan->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Bukti" class="img-thumbnail rounded" style="max-height: 150px;">
                                </div>
                            @else
                                <p class="text-muted small">Tidak ada foto yang diunggah sebelumnya.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Ganti Foto Bukti (Opsional)</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                            <div class="form-text">Kosongkan jika tidak ingin mengganti foto. Maksimal 2MB.</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('lapor-banjir.index') }}" class="btn btn-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">
                                <i class="fas fa-save me-1"></i> Perbarui Laporan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection