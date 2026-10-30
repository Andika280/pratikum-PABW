@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">
            <i class="fas fa-water text-primary me-2"></i> Daftar Laporan Kejadian Banjir
        </h3>
        <a href="{{ route('lapor-banjir.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Buat Laporan Baru
        </a>
    </div>

    <!-- Container Tabel -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase fs-7">
                        <tr>
                            <th class="py-3 px-3">No</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nama Pelapor</th>
                            <th class="py-3"><i class="fas fa-map-marker-alt text-danger me-1"></i> Lokasi</th>
                            <th class="py-3"><i class="fas fa-ruler-vertical text-info me-1"></i> Tinggi Air</th>
                            <th class="py-3"><i class="fas fa-calendar-alt text-secondary me-1"></i> Tanggal</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans as $laporan)
                            <tr>
                                <td class="px-3 fw-bold">{{ $laporans->firstItem() + $loop->index }}</td>
                                <td>
                                    @if ($laporan->foto)
                                        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Banjir" width="60" height="60" class="rounded object-fit-cover shadow-sm">
                                    @else
                                        <span class="text-muted small">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $laporan->nama_pelapor }}</div>
                                    <small class="text-muted"><i class="fas fa-phone-alt me-1"></i>{{ $laporan->no_hp }}</small>
                                </td>
                                <td>
                                    {{ $laporan->lokasi }}
                                    <div class="text-muted small">Kec. {{ $laporan->kecamatan }}</div>
                                </td>
                                <td><span class="fw-bold text-primary">{{ $laporan->tinggi_air }} cm</span></td>
                                <td>{{ $laporan->tanggal_kejadian }}</td>
                                <td>
                                    @if($laporan->status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($laporan->status == 'Diproses')
                                        <span class="badge bg-warning text-dark">Diproses</span>
                                    @else
                                        <span class="badge bg-danger">Menunggu</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('lapor-banjir.show', $laporan->id) }}" class="btn btn-info btn-sm text-white px-2 py-1" title="Lihat Detail">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('lapor-banjir.edit', $laporan->id) }}" class="btn btn-warning btn-sm text-dark px-2 py-1" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('lapor-banjir.destroy', $laporan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Yakin ingin menghapus laporan ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Belum ada data laporan kejadian banjir.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $laporans->links() }}
    </div>
</div>
@endsection