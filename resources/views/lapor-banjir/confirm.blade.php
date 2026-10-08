@extends('layouts.app')

@section('title', 'Konfirmasi Pengiriman')

@section('content')
    <h2>Konfirmasi Laporan</h2>
    
    {{-- Memanggil Komponen Alert --}}
    <x-alert type="success" message="Laporan banjir Anda berhasil dikirim dan dicatat oleh sistem!" />

    <div class="card">
        <h3>Detail Laporan Anda:</h3>
        <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
        <p><strong>Lokasi:</strong> {{ $data['lokasi'] }}</p>
        <p><strong>Tinggi Air:</strong> {{ $data['tinggi_air'] }} cm</p>
        
        <br>
        <a href="{{ route('lapor.index') }}"><button type="button">Kembali ke Daftar Laporan</button></a>
    </div>
@endsection