@extends('layouts.main')
@section('title', 'Login - Agrilink ID')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-success">
                <div class="card-header bg-success text-white text-center py-3">
                    <h4 class="mb-0"><i class="bi bi-leaf"></i> Login Agrilink ID</h4>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">Email atau password salah.</div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">MASUK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection