@extends('layouts.app')

@section('title', 'Form Pelaporan')

@section('content')
    <h2>Form Lapor Banjir Baru</h2>
    <div class="card">
        <form action="{{ route('lapor.store') }}" method="POST">
            @csrf
            <label for="nama">Nama Pelapor:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="lokasi">Lokasi Kejadian (Kecamatan/Desa):</label>
            <input type="text" name="lokasi" id="lokasi" required>

            <label for="tinggi_air">Tinggi Genangan Air (cm):</label>
            <input type="number" name="tinggi_air" id="tinggi_air" required min="1">

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>
@endsection