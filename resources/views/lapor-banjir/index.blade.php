@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header Bagian Atas Tabel -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">
            <i class="fas fa-water text-primary me-2"></i> Daftar Laporan Kejadian Banjir
        </h3>
        <a href="{{ route('lapor.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Buat Laporan Baru
        </a>
    </div>

    <!-- Container Tabel -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th class="py-3" width="5%">No</th>
                            <th class="py-3 text-start">Nama Pelapor</th>
                            <th class="py-3 text-start"><i class="fas fa-map-marker-alt me-1 text-danger"></i> Lokasi Kejadian</th>
                            <th class="py-3" width="18%"><i class="fas fa-ruler-vertical me-1 text-info"></i> Tinggi Air</th>
                            <th class="py-3" width="18%"><i class="fas fa-calendar-alt me-1 text-secondary"></i> Tanggal</th>
                            <th class="py-3" width="12%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $index => $laporan)
                        <tr>
                            <td class="text-center text-muted">{{ $index + 1 }}</td>
                            <td><span class="fw-semibold">{{ $laporan->nama ?? $laporan->nama_pelapor ?? '-' }}</span></td>
                            <td>{{ $laporan->lokasi ?? $laporan->lokasi_kejadian ?? '-' }}</td>
                            <td class="text-center fw-bold text-secondary">{{ $laporan->tinggi_air ?? $laporan->tinggi_genangan ?? '0' }} cm</td>
                            <td class="text-center">{{ $laporan->tanggal ?? $laporan->tanggal_kejadian ?? '-' }}</td>
                            <td class="text-center">
                                @php
                                    $tinggi = $laporan->tinggi_air ?? $laporan->tinggi_genangan ?? 0;
                                @endphp
                                @if($tinggi > 100)
                                    <span class="badge bg-danger rounded-pill px-3 py-2 shadow-sm">
                                        <i class="fas fa-exclamation-triangle me-1"></i> Awas
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2 shadow-sm">
                                        <i class="fas fa-info-circle me-1"></i> Waspada
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 text-secondary opacity-50"></i><br>
                                <h5>Belum ada data laporan banjir.</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection