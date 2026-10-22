@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">Dashboard Sistem LaporBanjir</div>
                <div class="card-body p-4 text-center">
                    <h4 class="mb-3">Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">Anda berhasil login ke dalam sistem BPBD Kabupaten Bandung.</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('lapor.index') }}" class="btn btn-success mx-2">
                            <i class="fas fa-list"></i> Lihat Daftar Laporan
                        </a>
                        <a href="{{ route('profile') }}" class="btn btn-outline-primary mx-2">
                            <i class="fas fa-user"></i> Cek Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection