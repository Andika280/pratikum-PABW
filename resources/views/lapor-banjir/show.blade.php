@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i> Detail Laporan Kejadian Banjir</h4>
                </div>
                <div class="card-body p-4">
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Nama Pelapor</div>
                        <div class="col-md-8 fs-6">{{ $laporan->nama_pelapor }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">No. HP (WhatsApp)</div>
                        <div class="col-md-8">{{ $laporan->no_hp }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Lokasi Kejadian</div>
                        <div class="col-md-8">{{ $laporan->lokasi }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Kecamatan</div>
                        <div class="col-md-8">{{ $laporan->kecamatan }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Tinggi Genangan Air</div>
                        <div class="col-md-8 text-primary fw-bold">{{ $laporan->tinggi_air }} cm</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Tanggal Kejadian</div>
                        <div class="col-md-8">{{ $laporan->tanggal_kejadian }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Status Penanganan</div>
                        <div class="col-md-8">
                            @if($laporan->status == 'Selesai')
                                <span class="badge bg-success">Selesai</span>
                            @elseif($laporan->status == 'Diproses')
                                <span class="badge bg-warning text-dark">Diproses</span>
                            @else
                                <span class="badge bg-danger">Menunggu</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold text-muted">Keterangan / Kondisi</div>
                        <div class="col-md-8">{{ $laporan->keterangan ?? '-' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold text-muted">Foto Bukti Banjir</div>
                        <div class="col-md-8">
                            @if ($laporan->foto)
                                <a href="{{ asset('storage/' . $laporan->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Bukti" class="img-fluid rounded shadow-sm border" style="max-height: 300px;">
                                </a>
                                <div class="form-text mt-1">Klik gambar untuk membuka ukuran penuh.</div>
                            @else
                                <span class="text-muted">Tidak ada foto yang diunggah.</span>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
                        <a href="{{ route('lapor-banjir.index') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <div>
                            <a href="{{ route('lapor-banjir.edit', $laporan->id) }}" class="btn btn-warning px-4 text-dark me-2">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('lapor-banjir.destroy', $laporan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-4" onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                    <i class="fas fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection