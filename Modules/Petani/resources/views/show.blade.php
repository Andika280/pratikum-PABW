@extends('layouts.main')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header text-center">Detail Produk</div>
        <div class="card-body text-center">
            
            @if ($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" width="250" class="rounded mb-3 border">
            @else
                <div class="mb-3"><span class="text-muted">Belum ada foto</span></div>
            @endif
            
            <h4 class="card-title text-success">{{ $produk->nama_produk }}</h4>
            
            <ul class="list-group list-group-flush text-start mt-3">
                <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($produk->harga_per_kg, 0, ',', '.') }} / Kg</li>
                <li class="list-group-item"><strong>Stok Tersedia:</strong> {{ $produk->stok_kg }} Kg</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> <br> {{ $produk->deskripsi }}</li>
            </ul>
            
            <div class="mt-4">
                <a href="{{ route('produk.edit', $produk) }}" class="btn btn-warning">Edit Data</a>
                <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                </form>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection