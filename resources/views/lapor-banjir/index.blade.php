@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <h2>Daftar Laporan Kejadian Banjir</h2>
    <hr>
    
    @forelse($laporans as $laporan)
        @include('partials.laporan-card', ['laporan' => $laporan])
    @empty
        <p>Belum ada laporan banjir yang masuk.</p>
    @endforelse
@endsection