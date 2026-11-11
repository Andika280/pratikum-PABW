@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Tambah Produk Baru</div>
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="form-control @error('nama_produk') is-invalid @enderror" required>
                    @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga per Kg</label>
                    <input type="number" name="harga_per_kg" value="{{ old('harga_per_kg') }}" class="form-control @error('harga_per_kg') is-invalid @enderror" required>
                    @error('harga_per_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Stok (Kg)</label>
                    <input type="number" name="stok_kg" value="{{ old('stok_kg') }}" class="form-control @error('stok_kg') is-invalid @enderror" required>
                    @error('stok_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk (Maks 2 MB)</label>
                    <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror" required>
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection