@extends('layouts.main')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Produk Agrilink</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga/Kg</th>
                <th>Stok (Kg)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $produk)
                <tr>
                    <td>{{ $products->firstItem() + $loop->index }}</td>
                    <td>
                        @if ($produk->foto)
                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto" width="60" height="60" class="rounded object-fit-cover">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp {{ number_format($produk->harga_per_kg, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok_kg }}</td>
                    <td>
                        <a href="{{ route('produk.show', $produk) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('produk.edit', $produk) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection