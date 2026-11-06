@extends('layouts.main')

@section('title', 'Edit Produk')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Edit Produk</div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control @error('nama_produk') is-invalid @enderror" required>
                    @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga per Kg</label>
                    <input type="number" name="harga_per_kg" value="{{ old('harga_per_kg', $produk->harga_per_kg) }}" class="form-control @error('harga_per_kg') is-invalid @enderror" required>
                    @error('harga_per_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Stok (Kg)</label>
                    <input type="number" name="stok_kg" value="{{ old('stok_kg', $produk->stok_kg) }}" class="form-control @error('stok_kg') is-invalid @enderror" required>
                    @error('stok_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Foto Saat Ini</label>
                    @if ($produk->foto)
                        <img src="{{ asset('storage/' . $produk->foto) }}" width="120" class="rounded mb-2 border">
                    @endif
                    <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection